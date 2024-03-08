<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $checkorder = Order::where('id', Auth::guard('web')->user()->id)->count();

        if ($checkorder == 0) {
            \Stripe\Stripe::setApiKey('sk_test_51L1Q4WAIzqv6QO7WoJDa1MYHcwBEhYBO4gexsClfPbQOphaqPo70CKNVm7ecgfGoTR6wKx6HCYVCygf4lm2pCMqk00eZETo56z');

            $charge = \Stripe\Charge::create([
                'source' => $_POST['stripeToken'],
                'description' => 'Cleaning service',
                'amount' => $request->price,
                'currency' => 'usd',
            ]);


            if ($charge->status == 'succeeded') {
                DB::beginTransaction();

                try {

                    $order = Order::create([
                        'package_name' => $request->package_name,
                        'user_id' => Auth::guard('web')->user()->id,
                        'user_email' => $request->stripeEmail,
                        'price' => $charge->amount,
                        'status' => $charge->status,
                        'transaction_id' => $charge->balance_transaction,
                         'package_type'=> $request->package_type,
                    ]);

                    DB::commit();
                } catch (\Exception $err) {
                    $order = null;
                }

                if ($order != null) {
                    return response()->json([
                        'status' => 200,
                        'msg' => 'Order Confirm'
                    ]);
                } else {
                    return response()->json([
                        'status' => 500,
                        'msg' => 'Internal Server Error',
                        'err_msg' => $err->getMessage()
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'msg' => 'Pement do not Success',
                ]);
            }
        }else{
            return response()->json([
                'status' => 500,
                'msg' => 'Already Have an Order',
            ]);
        }
    }
}
