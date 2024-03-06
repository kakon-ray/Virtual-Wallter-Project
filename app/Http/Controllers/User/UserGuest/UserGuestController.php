<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGuestController extends Controller
{
    public function home(){
        return view('user.guest.home');
    }
}
