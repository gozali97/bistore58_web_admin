<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\TransaksiDetail;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transaksiPending['listPending'] = Transaksi::whereStatus("Menunggu Pembayaran")->get();
        $transaksiPending['listPending'] = Transaksi::with('details.produk')->whereStatus("Menunggu Pembayaran")->get();
        $transaksiSelesai['listSelesai'] = Transaksi::where("Status", "NOT LIKE", "%Menunggu Pembayaran%")->get();
        // dd($transaksiPending['listPending']);
        return view('transaksi')->with($transaksiPending)->with($transaksiSelesai);
    
    }

    public function batal($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();

        $transaksi->update([
            'status' => "Batal"
        ]);

        $this->pushNotif('Transaksi Dibatalkan', "Transaksi " . $transaksi->details[0]->produk->nama_produk . " berhasil dibatalkan", $transaksi->user->fcm);

        return redirect('transaksi');
    }

    public function confirm($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();
        $transaksi->update([
            'status' => "Pembayaran Dikonfirmasi"
        ]);
        $this->pushNotif('Transaksi Dikonfirmasi', "Transaksi " . $transaksi->details[0]->produk->nama_produk . " sedang diprosess", $transaksi->user->fcm);

        return redirect('transaksi');
    }

    public function packing($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();

        $transaksi->update([
            'status' => "Packing"
        ]);

        $this->pushNotif('Produk Dipacking', "Transaksi " . $transaksi->details[0]->produk->nama_produk . " telah dipacking", $transaksi->user->fcm);

        return redirect('transaksi');
    }

    public function kirim($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();

        $transaksi->update([
            'status' => "Dikirim"
        ]);

        $this->pushNotif('Produk Dikirim', "Transaksi " . $transaksi->details[0]->produk->nama_produk . " telah dikirim", $transaksi->user->fcm);

        return redirect('transaksi');
    }

    public function selesai($id)
    {
        $transaksi = Transaksi::with(['details.produk', 'user'])->where('id', $id)->first();

        $transaksi->update([
            'status' => "Selesai"
        ]);

        $this->pushNotif('Transaksi Selesai', "Transaksi " . $transaksi->details[0]->produk->nama_produk . " selesai", $transaksi->user->fcm);

        return redirect('transaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
