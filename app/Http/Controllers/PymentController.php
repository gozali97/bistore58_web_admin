<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaksi;

class PymentController extends Controller
{
    //

    public function index(Request $request){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-gDMzeISDu3yi1nq2rJqb28c-';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        

        $id_users = $request->get('id_users');

        $id_transaksi = $request->get('id_transaksi');


        $user = User::where('id', $id_users)->first();
        $transaksi = Transaksi::where('id', $id_transaksi)->first();

        // dd($user->name);


        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $transaksi->total_bayar,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'last_name' => '',
                'email' => $user->email,
                'phone' => $user->phone,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // dd($snapToken);


        return view('v_payment',['snap_token' => $snapToken]);
    }
}
