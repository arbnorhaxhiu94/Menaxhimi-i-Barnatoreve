<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Barnatoret;
use App\Models\Produktet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {   
        $user = Auth::user()->email;
        $barnatorja = Barnatoret::where('manager', $user)->first();
        $produktet = Produktet::where('b_id', $barnatorja->id)->get();
    	return view('user.dashboard', compact('produktet', 'barnatorja'));
    }
}
