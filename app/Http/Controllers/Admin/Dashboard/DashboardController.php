<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;


use App\Models\Employe;
use App\Models\Package;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.home.index');
    }

    public function admin_role()
    {
        $admin = Admin::all();
        return view('admin.dashboard.adminrole.index',compact('admin'));
    }
 
    public function admin_role_accepted(Request $request)
    {
        $admin = Admin::find($request->id);

        if (is_null($admin)) {

            return response()->json([
                'msg' => "Do not Find Admin",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {

                // multiple image delete end

                $admin->role = 'admin';
                $admin->save();

                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Accepted',
                ], 200);
            } catch (\Exception $err) {

                DB::rollBack();

                return response()->json([
                    'msg' => "Internal Server Error",
                    'status' => 500,
                    'err_msg' => $err->getMessage()
                ], 500);
            }
        }
    }
}
