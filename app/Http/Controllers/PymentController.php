<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaksi;
use DateTime;

class PymentController extends Controller
{
    //
    public function __construct()
    {
        $this->Transaksi = new Transaksi;
    }

    public function index(Request $request)
    {
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

        if ($user == NULL) {
            $user->name = "";
        }

        $time = time();

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
            'custom_expiry' => array(
                'start_time' => date("Y-m-d H:i:s", $time),
                'unit' => 'minute',
                'duration'  => 1440
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // dd($snapToken);

        $data = [
            'snap_token' => $snapToken,
            'id_users' => $id_users,
            'id_transaksi' => $id_transaksi,
        ];

        return view('v_payment', $data);
    }

    public function payment_submit(Request $request)
    {
        $json = json_decode($request->get('json'));
        date_default_timezone_set('Asia/Jakarta');
        $id_transaksi = $request->id_transaksi;

        if (isset($json->va_numbers[0]->bank)) {
            $bank = $json->va_numbers[0]->bank;
        } else {
            $bank = "-";
        }

        if (isset($json->va_numbers[0]->va_number)) {
            $va_number = $json->va_numbers[0]->va_number;
        } else {
            $va_number = "-";
        }

        if (isset($json->bill_key)) {
            $bill_key = $json->bill_key;
        } else {
            $bill_key = "-";
        }

        if (isset($json->biller_code)) {
            $biller_code = $json->biller_code;
        } else {
            $biller_code = "-";
        }

        if (isset($json->permata_va_number)) {
            $permata_va_number = $json->permata_va_number;
        } else {
            $permata_va_number = "-";
        }

        if (isset($json->fraud_status)) {
            $fraud_status = $json->fraud_status;
        } else {
            $fraud_status = "-";
        }

        if (isset($json->payment_code)) {
            $payment_code = $json->payment_code;
        } else {
            $payment_code = "-";
        }

        $data = [
            'bank' => $bank,
            'va_number' => $va_number,
            'bill_key' => $bill_key,
            'biller_code' => $biller_code,
            'permata_va_number' => $permata_va_number,
            'tgl_payment' => date('Y-m-d H:i:s'),
            'status' => 'Pembayaran Dikonfirmasi',
            'order_id' => $json->order_id,
        ];

        $this->Transaksi->update_data($id_transaksi, $data);

        $batas_bayar = Transaksi::with(['details.produk', 'user'])->where('id', $id_transaksi)->first();

        $date = new DateTime($batas_bayar->tgl_payment);
        $date_plus = $date->modify("+1 days");

        $view = [
            'data' => Transaksi::with(['details.produk', 'user'])->where('id', $id_transaksi)->first(),
            'batas_bayar' => $date_plus->format("Y-m-d H:i:s"),
        ];

        return view('v_riwayat_payment', $view);
    }
}
