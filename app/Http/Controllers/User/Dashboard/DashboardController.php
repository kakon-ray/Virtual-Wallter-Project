<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $allPackage = Package::all();
        return view('user.guest.home',compact('allPackage'));
    }
}
