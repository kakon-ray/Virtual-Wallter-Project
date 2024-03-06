<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard.home.index');
    }
    public function addpackage(){
        return view('admin.dashboard.addpackage.index');
    }
    public function package_submit(Request $request){
        dd($request->all());
    }
}
