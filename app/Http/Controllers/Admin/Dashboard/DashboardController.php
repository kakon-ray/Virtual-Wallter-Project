<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
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
    public function addpackage()
    {
        return view('admin.dashboard.package.index');
    }
    public function package_manage()
    {
        $allpackage = Package::all();
        return view('admin.dashboard.package.manage',compact('allpackage'));
    }
    public function package_submit(Request $request)
    {

        $arrayRequest = [
            'name' => $request->name,
            'price' => $request->price,
        ];

        $arrayValidate  = [
            'name' => 'required',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/"
        ];


        $response = Validator::make($arrayRequest, $arrayValidate);

        if ($response->fails()) {
            $msg = '';
            foreach ($response->getMessageBag()->toArray() as $item) {
                $msg = $item;
            };

            return response()->json([
                'status' => 400,
                'msg' => $msg
            ], 200);
        } else {
            DB::beginTransaction();

            try {

                $package = Package::create([
                    'name' => $request->name,
                    'price' => $request->price,
                ]);

                DB::commit();
            } catch (\Exception $err) {
                $package = null;
            }

            if ($package != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Package'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'msg' => 'Internal Server Error',
                    'err_msg' => $err->getMessage()
                ]);
            }
        }
    }

    public function delete_package_submit(Request $request){
        $product = Package::find($request->id);

        if (is_null($product)) {

            return response()->json([
                'msg' => "Do not Find any Package",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {
             
                // multiple image delete end

                $product->delete();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Delete This Package',
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
