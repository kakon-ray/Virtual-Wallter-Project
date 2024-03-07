<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePementController extends Controller
{
    public function stripe()
    {
        return view('user.dashboard.stripe');
    }
    
    public function make_pement(Request $request)
    {
       dd($request->all());
       
    }
}
