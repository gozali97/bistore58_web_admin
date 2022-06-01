<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaksi;

use App\Veritrans\Veritrans;

class VtwebController extends Controller
{
    public function __construct()
    {
        Veritrans::$serverKey = 'SB-Mid-server-gDMzeISDu3yi1nq2rJqb28c-';

        //set Veritrans::$isProduction  value to true for production mode
        Veritrans::$isProduction = false;

        $this->Transaksi = new Transaksi;
    }

    public function index()
    {
    }

    public function notif()
    {
        $vt = new Veritrans;
        $json_result = file_get_contents('php://input');
        $result = json_decode($json_result);
        echo 'test notification handler 2</br>';


        if ($result) {
            // $notif = $vt->status($result->order_id);
            $notif = $vt->status($result->order_id);
            // echo $result->order_id;
            // error_log(print_r($result,TRUE));

            $transaction = $notif->transaction_status;
            $type = $notif->payment_type;
            $order_id = $notif->order_id;
            $fraud = $notif->fraud_status;

            if ($transaction == 'capture') {

                // For credit card transaction, we need to check whether transaction is challenge by FDS or not
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        // TODO set payment status in merchant's database to 'Challenge by FDS'
                        // TODO merchant should decide whether this transaction is authorized or not in MAP
                        echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                    } else {
                        // TODO set payment status in merchant's database to 'Success'
                        echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                    }
                } else if ($type == 'bank_transfer') {
                    if ($fraud == 'challenge') {
                        // TODO set payment status in merchant's database to 'Challenge by FDS'
                        // TODO merchant should decide whether this transaction is authorized or not in MAP
                        echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                    } else {
                        if ($fraud == 'deny') {
                            $this->status($order_id, "Pembayaran gagal");
                        } else {
                            $this->status($order_id, "Pembayaran Dikonfirmasi");
                        }
                        echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                    }
                }
            } else if ($transaction == 'settlement') {
                $this->status($order_id, "Pembayaran Dikonfirmasi");
                echo "transaksi berhasil";
            } else {
                echo "transaksi gagal";
            }
        } else {
            echo "gagal";
        }
    }

    public function status($order_id, $status)
    {
        $data = [
            'status' => $status
        ];
        $this->Transaksi->update_status($order_id, $data);
    }
}
