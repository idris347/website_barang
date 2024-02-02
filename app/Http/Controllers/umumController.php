<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class umumController extends Controller
{
    public function data_diri(){

        return view('umum.data');
    }
    public function log(){
        $data = array(
            'data' => DB::table('logs')->get(),
        );
        return view('umum.riwayat',$data);
    }
    public function galeri(){

        return view('umum.galeri');
    }
    public function scan(){

        return view('umum.scan');
    }
    public function plan(){

        return view('umum.plan');
    }
    public function scan2(){

        return view('umum.scan2');
    }
    public function store(Request $request){
       
        $id_barang = $request->input('id_barang');
        $barang = DB::table('tb_barangs')->where('id_barang', $id_barang)->first();

        return view('umum.scan2', compact('barang'));
    }
    
    public function download($id_barang)
{
    // Generate the QR code content
    $qrCodeContent = QrCode::size(400)->format('png')->generate($id_barang);

    // Set the filename for download
    $filename = "qrcode_{$id_barang}.png";

    // Set the headers for the download
    $headers = [
        'Content-Type' => 'image/png',
        'Content-Disposition' => "attachment; filename=\"{$filename}\"",
    ];

    // Send the response with the QR code image
    return Response::make($qrCodeContent, 200, $headers);
}
}
