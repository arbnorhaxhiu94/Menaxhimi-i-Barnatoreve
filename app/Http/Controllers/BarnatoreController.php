<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barnatoret;
use App\Models\Produktet;
use App\Models\Punetoret;

class BarnatoreController extends Controller
{
    public function index()
	{
		$barnatoret = Barnatoret::all();
    	return view('admin.barnatoret', compact('barnatoret'));
	}

	public function detajet($id) {
		$barnatorja = Barnatoret::where('id', $id)->first();
		$punetoret = Punetoret::where('b_id', $id)->get();
		$produktet = Produktet::where('b_id', $id)->get();
		$totali_paga = 0;
		for($i=0; $i<count($punetoret); $i++) {
			$totali_paga = $totali_paga+$punetoret[$i]->paga;
		}
		return view('admin.barnatorja_detajet', compact('barnatorja', 'produktet', 'punetoret', 'totali_paga'));
	}
}
