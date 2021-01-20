<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barnatoret;

class BarnatoretController extends Controller
{
	public function index()
	{
		$barnatoret = Barnatoret::all();
    	return view('admin.barnatoret', compact('barnatoret'));
	}
}
