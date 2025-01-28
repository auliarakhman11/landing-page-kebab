<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    // public function index(Request $request)
    // {
    //     $data = [
    //         'title' => 'Kebab Yasmin | Cart'
    //     ];
    //     return view('page.check',$data);
    // }

    public function getDataUser(Request $request) {
        $nomor = $request->nomor;

        $dt_user = Costumer::where('no_tlp','=',$nomor)->first();

        if($dt_user){
            $request->session()->put('nomor',$dt_user->no_tlp);
            $request->session()->put('nama',$dt_user->nama);
            $request->session()->put('alamat',$dt_user->alamat);

            $request->session()->put('lat',$dt_user->latitude);
            $request->session()->put('long',$dt_user->longitude);

           $data_user = [
                'nama' => $dt_user->nama,
                'nomor' => $dt_user->no_tlp,
                'alamat' => $dt_user->alamat,
                'lat' => $dt_user->latitude,
                'long' => $dt_user->longitude,
                'status' => 'authenticated'
            ];
            echo json_encode($data_user);
        }else{
            return 'kosong';
        }

		
		return 'success';
    }
    
    public function checkAuth(Request $request)
    {
        $nomor = $request->session()->has('nomor');
        if($nomor){
            $dt_no = $request->session()->get('nomor');
            $dt_user = Costumer::where('no_tlp','=',$dt_no)->first();
            $data_user = [
                'nama' => $dt_user->nama,
                'nomor' => $dt_user->no_tlp,
                'alamat' => $dt_user->alamat,
                'lat' => $dt_user->latitude,
                'long' => $dt_user->longitude,
                'status' => 'authenticated'
            ];
            echo json_encode($data_user);
        }else{
            $nomor_s = $request->session()->has('nomor_sementara');
            if($nomor_s){
                $dt_user = [
                    'nama' => $request->session()->get('nama_sementara'),
                    'nomor' => $request->session()->get('nomor_sementara'),
                    'alamat' => $request->session()->get('alamat_sementara'),
                    'lat' => $request->session()->get('lat_sementara'),
                    'long' => $request->session()->get('long_sementara'),
                    'status' => 'sementara'
                ];
                echo json_encode($dt_user);
            }else{
                $dt_user = [
                    'status' => 'not authenticated'
                ];
                echo json_encode($dt_user);
            }
        }

    }

    public function verifikasi(Request $request)
    {
        $nomor = $request->nomor;
        $alamat = $request->alamat;
        $nama = $request->nama;

        $lat = $request->lat;
        $long = $request->long;

        $no_wa = substr($nomor,1);

        $kode = random_int(1000, 9999);

        $cek = Costumer::where('no_tlp','=',$nomor)->first();

        $wa = [
            'api_key' => 'E83hJoTofwANJ1Y34HEURbWkYYXAW9',
            'sender'  => '6281346350676',
            'number'  => '62'.$no_wa,
            'message' => $kode.' adalah kode OTP Anda',
        ];
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://wagw.kebabyasmin.id/send-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($wa),
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'
            ),
          ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $hasil = json_decode($response, TRUE);

        if($hasil['status'] == true){
            $request->session()->put('nama_sementara',$nama);
            $request->session()->put('nomor_sementara',$nomor);
            $request->session()->put('alamat_sementara',$alamat);
            $request->session()->put('lat_sementara',$lat);
            $request->session()->put('long_sementara',$long);

            $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'kode' => $kode,
                'no_tlp' => $nomor,
                'latitude' => $lat,
                'longitude' => $long
            ];
            if($cek){
                Costumer::where('no_tlp',$nomor)->update($data);
            }else{
                Costumer::create($data);
            }

            return true;
        }else{
            return false;
        }

        
    }

    public function checkOtp(Request $request)
    {
        $nomor = $request->session()->get('nomor_sementara');
        $dt_costumer = Costumer::where('no_tlp','=',$nomor)->first();

        if($dt_costumer->kode == $request->otp){

            $nama = $request->session()->get('nama_sementara');
            $alamat = $request->session()->get('alamat_sementara');

            $lat = $request->session()->get('lat_sementara');
            $long = $request->session()->get('long_sementara');

            if($nama != $dt_costumer->nama || $alamat != $dt_costumer->alamat){
                $dt_update = [
                    'alamat' => $alamat,
                    'nama' => $nama
                ];
                Costumer::where('no_tlp',$request->nomor)->update($dt_update);
            }
            

            $request->session()->put('nama',$nama);
            $request->session()->put('nomor',$nomor);
            $request->session()->put('alamat',$alamat);
            $request->session()->put('lat',$lat);
            $request->session()->put('long',$long);

            $request->session()->forget('nama_sementara');
            $request->session()->forget('nomor_sementara');
            $request->session()->forget('alamat_sementara');

            
            if(Cart::count() == 0){
                return 'kosong';
            }else{
                return 'sesuai';
            }
            
        }else{
            return 'tidak';
        }
    }
}
