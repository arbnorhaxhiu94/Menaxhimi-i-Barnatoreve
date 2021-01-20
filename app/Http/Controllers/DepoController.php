<?php

namespace App\Http\Controllers;

use App\Models\Barnatoret;
use App\Models\Punetoret;
use App\Models\Depo;
use App\Models\Produktet;
use Illuminate\Http\Request;

class DepoController extends Controller
{
    public function getAll()
    {
        $punetoret = Punetoret::where('b_id', 6)->get();
        $totali_paga = 0;
        for($i=0; $i<count($punetoret); $i++) {
            $totali_paga = $totali_paga + $punetoret[$i]->paga;
        }
        $produktet = Depo::all();

        return view('admin.depo', compact('punetoret', 'produktet', 'totali_paga'));
    }

    public function addForm()
    {
        return view('admin.shtoDepo');
    }

    public function add(Request $request)
    {
        $produktet = Depo::all();
        $exists = false;

        for($i=0; $i<count($produktet); $i++) {
            if($produktet[$i]->bar_kodi == $request->get('bar_kodi')) {
                $exists = true;
                if($this->addWhereExists($produktet[$i]->bar_kodi, $request->get('sasia'))) {
                    return redirect(route('admin.depo'))->with('edit_success', 'Ndryshimi u bë me sukses.');
                }
            }
        }

        if(!$exists) {
            Depo::create([
                'bar_kodi'      => $request->get('bar_kodi'),
                'emri'          => $request->get('emri'),
                'sasia'         => $request->get('sasia'),
                'cmimi_blerjes' => $request->get('cmimi_blerjes'),
                'cmimi_shitjes' => $request->get('cmimi_shitjes'),
            ]);
    
            return redirect(route('admin.depo'))->with('add_success', 'Një punëtor u shtua me sukses.');
        }
    }

    public function addWhereExists($bar_kodi, $sasia_in)
    {
        // dd($sasia_in);
        $produkti = Depo::where('bar_kodi', $bar_kodi)->first();
        $sasia = $produkti->sasia;
        $produkti->update([
            // 'bar_kodi'  => $inputs->bar_kodi,
            // 'emri'      => $inputs->emri,
            'sasia'     => $sasia + $sasia_in,
        ]);

        return true;
    }

    public function transferoForm($id)
    {
        $barnatoret = Barnatoret::all();
        $produkti = Depo::where('id', $id)->first();
        return view('admin.transferoForm', compact('barnatoret', 'produkti'));
    }

    public function transfero(Request $request)
    {
        // dd($request->get('bar_kodi'));
        $produkti = Produktet::where([
            ['b_id', '=', $request->get('b_id')],
            ['bar_kodi', '=', $request->get('bar_kodi')]
        ])->first();

        if($produkti) {
            $sasia_tash = $produkti->sasia;
            $produkti->update([
                'sasia' => $sasia_tash + $request->get('sasia'),
            ]);

            $depo = Depo::where('bar_kodi', $request->get('bar_kodi'))->first();
            $depo_sasia = $depo->sasia;
            $depo->update([
                'sasia' => $depo_sasia - $request->get('sasia'),
            ]);
        }
        else {
            
            Produktet::create([
                'emri'          => $request->get('emri'),
                'bar_kodi'      => $request->get('bar_kodi'),
                'cmimi'         => $request->get('cmimi_shitjes'),
                'b_id'          => $request->get('b_id'),
                'sasia'         => $request->get('sasia'),
            ]);

            $depo = Depo::where('bar_kodi', $request->get('bar_kodi'))->first();
            $depo_sasia = $depo->sasia;
            $depo->update([
                'sasia' => $depo_sasia - $request->get('sasia'),
            ]);
        }
        // dd($produkti);

        return redirect(route('admin.depo'))->with('transfer_success', 'Transferimi u bë me sukses.');
    }
}
