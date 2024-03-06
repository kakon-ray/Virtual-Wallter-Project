<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class UserGuestController extends Controller
{
    public function home(){
        $allPackage = Package::all();
        return view('user.guest.home',compact('allPackage'));
    }
}
