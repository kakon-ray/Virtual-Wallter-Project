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
        \Stripe\Stripe::setApiKey('sk_test_51L1Q4WAIzqv6QO7WoJDa1MYHcwBEhYBO4gexsClfPbQOphaqPo70CKNVm7ecgfGoTR6wKx6HCYVCygf4lm2pCMqk00eZETo56z');

        $charge = \Stripe\Charge::create([
            'source' => $_POST['stripeToken'],
            'description' => 'Cleaning service',
            'amount' => 1000,
            'currency' => 'usd',
        ]);

        dd($charge);
    }
}
