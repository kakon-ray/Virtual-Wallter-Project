<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function information(){
        return view('user.dashboard.information');
    }
    public function information_submit(Request $request){
        $arrayRequest = [
            'account_number' => $request->account_number,
            'card_number' => $request->card_number,
            'phone_number' => $request->phone_number,
            'contact' => $request->contact,
        ];

        $arrayValidate  = [
            'account_number' =>  'required',
            'card_number' => 'required',
            'phone_number' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'contact' => 'required',
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

                $products = Information::create([
                    'account_number' => $request->account_number,
                    'card_number' => $request->card_number,
                    'phone_number' => $request->phone_number,
                    'contact' => $request->contact,
                ]);

            } catch (\Exception $err) {
                $products = null;
            }

            if ($products != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Employe'
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

    public function myorder(){

        $myorder = User::where('email',Auth::guard()->user()->email)->with('order')->first();
        $myorder = $myorder->order;
        return view('user.dashboard.myorder',compact('myorder'));
    }



}
