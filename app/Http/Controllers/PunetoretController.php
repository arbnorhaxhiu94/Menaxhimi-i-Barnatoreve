<?php

namespace App\Http\Controllers;

use App\Models\Barnatoret;
use App\Models\Punetoret;
use Illuminate\Http\Request;

class PunetoretController extends Controller
{

    public function getAll()
    {
        $punetoret = Punetoret::all();
        $totali_paga = 0;
        for($i=0; $i<count($punetoret); $i++) {
            $totali_paga = $punetoret[$i]->paga + $totali_paga;
        }
        $totali_punetoret = count($punetoret);
        return view('admin.punetoret', compact('punetoret', 'totali_paga', 'totali_punetoret'));
    }

    public function get($id)
    {
        $barnatoret = Barnatoret::all();
        $punetor = Punetoret::where('id', $id)->first();
        return view('admin.punetori', compact('punetor', 'barnatoret'));
    }

    public function addWorkerForm()
    {
        $barnatoret = Barnatoret::all();
        return view('admin.shtoPunetor', compact('barnatoret'));
    }

    public function shto(Request $request)
    {
        Punetoret::create([
            'emri'      => $request->get('emri'),
            'pozita'    => $request->get('pozita'),
            'paga'      => $request->get('paga'),
            'aktiv'     => 1,
            'b_id'      => $request->get('b_id')
        ]);

        return redirect(route('admin.punetoret'))->with('add_success', 'Një punëtor u shtua me sukses.');
    }

    public function ndrysho(Request $request, $id)
    {
        $punetor = Punetoret::where('id', $id)->first();

        $punetor->update([
            'emri'      => $request->get('emri'),
            'pozita'    => $request->get('pozita'),
            'paga'      => $request->get('paga'),
            'aktiv'     => $request->get('aktiv'),
            'b_id'      => $request->get('b_id')
        ]);

        return redirect(route('admin.barnatorja_detajet', $request->get('b_id')))->with('edit_success', 'Ndryshimi u bë me sukses.');
    }
}
