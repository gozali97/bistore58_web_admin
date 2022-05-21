<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\User;
use App\TransaksiDetail;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'user_id' => 'required',
            'total_produk' => 'required',
            'total_harga' => 'required',
            'nama_penerima' => 'required',
            'jasa_pengiriman' => 'required',
            'ongkir' => 'required',
            'total_bayar' => 'required',
            'bank' => 'required',
            'no_tlp' => 'required',
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_payment = "INV/PYM/" . now()->format('y-m-d') . "/" . rand(100, 999);
        $kode_trx = "INV/PYM/" . now()->format('y-m-d') . "/" . rand(100, 999);
        $kode_unik = rand(100, 999);
        $status = "Menunggu";
        $expired_at = now()->addDay();

        $dataTransaksi = array_merge($request->all(), [
            'kode_payment' => $kode_payment,
            'kode_trx' => $kode_trx,
            'kode_unik' => $kode_unik,
            'status' => $status,
            'expired_at' => $expired_at,
        ]);

        \DB::beginTransaction();
        $transaksi = Transaksi::create($dataTransaksi);
        foreach ($request->produks as $produk) {
            $detail = [
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produk['id'],
                'total_item' => $produk['total_item'],
                'catatan' => $produk['catatan'],
                'total_harga' => $produk['total_harga'],
            ];
            $transaksiDetail = TransaksiDetail::create($detail);
        }

        if (!empty($transaksi) && !empty($transaksiDetail)) {
            \DB::commit();
            return @response()->json([
                'success' => 1,
                'message' => 'Transaksi berhasil',
                'transaksi' => collect($transaksi)
            ]);
        } else {
            \DB::rollback();
            $this->error("Transaksi gagal");
        }
    }
    
    public function history($id)
    {
        $transaksis = Transaksi::with(['user'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->orderBy("id", "desc")->get();

        foreach ($transaksis as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail)
                $detail->produk;
        }

        if (!empty($transaksis)) {
            return @response()->json([
                'success' => 1,
                'message' => 'Transaksi berhasil',
                'transaksis' => collect($transaksis)
            ]);
        } else {
            $this->error("Transaksi gagal");
        }
    }

    public function batal($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        if ($transaksi) {
            $transaksi->update([
                'status' => "Batal"
            ]);

            $this->pushNotif('Transaksi Dibatalkan', "Transaksi " . $transaksi->details[0]->produk->nama_produk . "
            berhasil dibatalkan", $transaksi->user->fcm);

            return @response()->json([
                'success' => 1,
                'message' => 'Berhasil',
                'transaksis' => $transaksi
            ]);
        } else {
            return $this->error("Terjadi kesalahan");
        }
    }

    public function pushNotif($title, $message, $mFcm)
    {

        $mData = [
            'title' => $title,
            'body' => $message
        ];

        $fcm[] = $mFcm;

        $payload = [
            'registration_ids' => $fcm,
            'notification' => $mData
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AAAA8iiKfqI:APA91bEkoGA0s2kBIAx8agyKRxkKITSp4kLHFvv5yjyOy7iTUDgjsNBFG06rqIcyFdx1ICNZtq8Nw9ZG0JrJvcWF_eYeh-hSGwWDZTtUuOV91B1OOfog7xBtmQTZ4AyzkxsI1Qge7E8P"
            ),
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = [
            'success' => 1,
            'message' => "Push notif success",
            'data' => $mData,
            'firebase_response' => json_decode($response)
        ];
        return $data;
    }

    // Detail Login cPanel
    // Domain	: www.baliindahphoto.xyz
    // cPanel Username	: baliind2
    // cPanel Password	: AJSv*)2Oci71u3
    // Control Panel URL	: http://ares.id.domainesia.com/cpanel
    // Alternatif	: http://baliindahphoto.xyz/cpanel

    public function error($pesan)
    {
        return @response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
