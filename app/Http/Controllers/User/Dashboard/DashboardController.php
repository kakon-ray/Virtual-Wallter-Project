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
use PDF;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function information()
    {
        $userinfomation = User::where('id', Auth::guard('web')->user()->id)->first();
        $myorder = User::where('email', Auth::guard()->user()->email)->with('order')->first();
        $myorder = $myorder->order->first();
        return view('user.dashboard.information', compact('userinfomation', 'myorder'));
    }
    public function passport_national_id()
    {
        $myorder = User::where('email', Auth::guard()->user()->email)->with('order')->first();
        $myorder = $myorder->order->first();
        return view('user.dashboard.passportNationID', compact('myorder'));
    }
    public function passport_national_id_download()
    {
        $myorder = User::where('email', Auth::guard()->user()->email)->with('order')->first();
        $myorder = $myorder->order->first();

        return view('user.dashboard.download_passport_id', compact('myorder'));
    }
    public function pdf_download()
    {
        $userinfomation = User::where('id', Auth::guard('web')->user()->id)->first();

        $passport_front = pathinfo($userinfomation->passport_front);
        $passport_front = $passport_front['basename'];

        $passport_back = pathinfo($userinfomation->passport_back);
        $passport_back = $passport_back['basename'];

        $id_front = pathinfo($userinfomation->id_front);
        $id_front = $id_front['basename'];

        $id_back = pathinfo($userinfomation->id_back);
        $id_back = $id_back['basename'];

        $data = [
            'passport_front' => $passport_front,
            'passport_back' => $passport_back,
            'id_front' => $id_front,
            'id_back' => $id_back,
        ];
        $pdf = PDF::loadView('user.dashboard.download_pdf', $data);

        return $pdf->download('passportandid.pdf');
    }


    public function passport_submit(Request $request)
    {

        $user = User::find(Auth::guard('web')->user()->id);

        $arrayRequest = [
            'passport_front' => $request->passport_front,
            'passport_back' => $request->passport_back,
        ];

        $arrayValidate  = [
            'passport_front' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'passport_back' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],

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

                if ($request->passport_front) {
                    $file = $request->file('passport_front');
                    $filename = 'passport-front' . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $passport_front = "http://" . $host . "/uploads/" . $filename;
                }
                if ($request->passport_back) {
                    $file = $request->file('passport_back');
                    $filename = 'passport-back' . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $passport_back = "http://" . $host . "/uploads/" . $filename;
                }



                $user->passport_front =  $passport_front;
                $user->passport_back =  $passport_back;
                $user->save();

                DB::commit();
            } catch (\Exception $err) {
                $user = null;
            }

            if ($user != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Images'
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


    public function nationalid_submit(Request $request)
    {

        $user = User::find(Auth::guard('web')->user()->id);

        $arrayRequest = [
            'id_front' => $request->id_front,
            'id_back' => $request->id_back,
        ];

        $arrayValidate  = [
            'id_front' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'id_back' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],

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

                if ($request->id_front) {
                    $file = $request->file('id_front');
                    $filename = 'id-front' . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $id_front = "http://" . $host . "/uploads/" . $filename;
                }
                if ($request->id_back) {
                    $file = $request->file('id_back');
                    $filename = 'id-back' . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $id_back = "http://" . $host . "/uploads/" . $filename;
                }



                $user->id_front =  $id_front;
                $user->id_back =  $id_back;
                $user->save();

                DB::commit();
            } catch (\Exception $err) {
                $user = null;
            }

            if ($user != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Images'
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


    public function information_submit(Request $request)
    {

        $user = User::find($request->id);

        if (is_null($user)) {
            return response()->json([
                'msg' => "Do not Find any User",
                'status' => 404
            ], 404);
        } else {
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

                    $user->account_number =  $request->account_number;
                    $user->card_number =  $request->card_number;
                    $user->phone_number =  $request->phone_number;
                    $user->contact =  $request->contact;
                    $user->save();

                    DB::commit();
                } catch (\Exception $err) {
                    $user = null;
                }

                if ($user != null) {
                    return response()->json([
                        'status' => 200,
                        'msg' => 'User Information Saved'
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
    }

    public function myorder()
    {

        $myorder = User::where('email', Auth::guard()->user()->email)->with('order')->first();
        $myorder = $myorder->order;
        return view('user.dashboard.myorder', compact('myorder'));
    }
}
