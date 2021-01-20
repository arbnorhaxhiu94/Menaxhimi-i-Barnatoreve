<?php

namespace App\Http\Controllers;

use App\Models\Barnatoret;
use App\Models\Produktet;
use App\Models\Shitjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShitjetController extends Controller
{

    public function getAll()
    {
        $shitjet = Shitjet::all()->reverse();
        return view('admin.shitjet', compact('shitjet'));
    }

    public function getOne($id)
    {
        $barnatorja = Barnatoret::where('id', $id)->first();
        if (Gate::allows('check_manager', $barnatorja)) {
            $shitjet = Shitjet::where('b_id', $id)->get()->reverse();
            return view('admin.shitjet', compact('shitjet'));
        }
        else if(Gate::allows('check_admin')) {
            $shitjet = Shitjet::where('b_id', $id)->get()->reverse();
            return view('admin.shitjet', compact('shitjet'));
        }
        else {
            return;
        }
    }

    public function index($id)
    {

        $produkti = Produktet::where('id', $id)->first();
        // dd($produkti);
        return view('user.shitjeForm', compact('produkti'));
    }

    public function shitje(Request $request, $id)
    {
        $produkti = Produktet::where([
            ['id', '=', $id]
        ])->first();

        $sasia_tash = $produkti->sasia;
        if( $sasia_tash > $request->get('sasia') ) {
            $produkti->update([
                'sasia'     => $sasia_tash - $request->get('sasia'),
            ]);
    
            Shitjet::create([
                'bar_kodi'      => $request->get('bar_kodi'),
                'emri'          => $request->get('emri'),
                'sasia'         => $request->get('sasia'),
                'cmimi'         => $request->get('cmimi'),
                'b_id'          => $request->get('b_id'),
                'totali'        => $request->get('sasia')*$request->get('cmimi')
            ]);

            return redirect(route('user.dashboard'))->with('edit_success', 'Një punëtor u shtua me sukses.');
        } 
        else {
            return redirect(route('user.dashboard'))->with('no_success', 'Nuk ka mjaftueshem ne stok.');
        }
    }

    public function anulo(Request $request, $id)
    {
        // dd($id);
        Shitjet::where('id', $id)->delete();

        $produkti = Produktet::where([
            ['bar_kodi', '=', $request->get('bar_kodi')],
            ['b_id', '=', $request->get('b_id')]
        ])->first();

        $produkti->update([
            'sasia' => $produkti->sasia + $request->get('sasia')
        ]);

        return redirect(route('user.dashboard'))->with('cancel_success', 'Nuk ka mjaftueshem ne stok.');
    }
}
