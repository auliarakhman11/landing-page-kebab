<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Invoice;
use App\Models\Penjualan;
use App\Models\PenjualanVarianOnline;
use App\Models\User;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Transaksi');
        SEOMeta::setDescription('The Best Snack In The Night');
        SEOMeta::setCanonical(route('transaksi'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('The Best Snack In The Night');
        OpenGraph::setTitle('Transaksi');
        OpenGraph::setUrl(route('transaksi'));
        OpenGraph::addImage(asset('auth').'/images/kebabyasmin-removebg.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Transaksi');
        TwitterCard::setDescription('The Best Snack In The Night');
        TwitterCard::setUrl(route('transaksi'));

        JsonLd::setTitle('Transaksi');
        JsonLd::setDescription('The Best Snack In The Night');
        JsonLd::addImage(asset('auth').'/images/kebabyasmin-removebg.png');

        $costumer = Costumer::where('no_tlp','=',$request->session()->get('nomor'))->first();
        $invoice = Invoice::select('*','invoice.total as total',Invoice::raw('SUM(penjualan.qty) as jumlah'))->leftJoin('penjualan','invoice.no_invoice','=','penjualan.no_invoice')->where('invoice.costumer_id','=',$costumer->id)->groupBy('invoice.no_invoice')->orderBy('invoice.id','DESC')->get();
        
        $data = [
            // 'title' => 'Kebab Yasmin | Transaksi',
            'invoice' => $invoice     
        ];
        return view('page.transaksi',$data);
    }

    public function checkOut(Request $request)
    {
        if($request->nomor == $request->session()->get('nomor')){

            if($request->alamat != $request->session()->get('alamat') || $request->nama != $request->session()->get('nama')){
                $request->session()->put('alamat',$request->alamat);
                $request->session()->put('nama',$request->nama);

                $dt_update = [
                    'alamat' => $request->alamat,
                    'nama' => $request->nama
                ];
                Costumer::where('no_tlp',$request->nomor)->update($dt_update);                
               
            }            

            if(Cart::count() != 0){
            $cart = Cart::content();
            $costumer = Costumer::where('no_tlp','=',$request->session()->get('nomor'))->first();
            $no_invoice = 'INV'.date('dmy').strtoupper(Str::random(5));
            $total_invoice = 0;
            $tgl = date('Y-m-d');
    
            foreach($cart as $c){

                $total_varian = 0;
                if($c->options->dt_varian){
                    foreach($c->options->dt_varian as $dtv){

                        $total_varian += $dtv['harga'] * $c->qty;

                    }
                }

                $total_penjualan= ($c->qty * $c->price)+$total_varian;

                $dt_penjualan = [
                    'no_invoice' => $no_invoice,
                    'costumer_id' => $costumer->id,
                    'produk_id' => $c->id,
                    'qty' => $c->qty,
                    'harga' => $c->price,
                    'total' => $total_penjualan,
                    'total_varian' => $total_varian,
                    'tgl' => $tgl
                ];
                $penjualan_id = Penjualan::create($dt_penjualan);

                if($c->options->saos){
                    $data_penjualan_varian = [
                        'no_invoice' => $no_invoice,
                        'penjualan_id' => $penjualan_id->id,
                        'varian_id' => $c->options->saos,
                        'qty' => $c->qty,
                        'harga' => 0,
                        'tgl' => $tgl
                    ];
                    PenjualanVarianOnline::create($data_penjualan_varian);
                }
                

                if($c->options->dt_varian){
                    foreach($c->options->dt_varian as $dtv){
                        $data_penjualan_varian = [
                            'no_invoice' => $no_invoice,
                            'penjualan_id' => $penjualan_id->id,
                            'varian_id' => $dtv['varian_id'],
                            'qty' => $c->qty,
                            'harga' => $dtv['harga'],
                            'tgl' => $tgl
                        ];
                        PenjualanVarianOnline::create($data_penjualan_varian);
                    }
                }


                $total_invoice += $total_penjualan;
            }
    
            $dt_invoice = [
                'no_invoice' => $no_invoice,
                'costumer_id' => $costumer->id,
                'total' => $total_invoice,
                'no_tlp' => $costumer->no_tlp,
                'alamat' => $costumer->alamat,
                'status' => 'Diproses',
                'tgl' => $tgl,
                'latitude' => $request->lat,
                'longitude' => $request->long,

            ];
            Invoice::create($dt_invoice);

            $url = 'https://fcm.googleapis.com/fcm/send';
            $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
            
            $serverKey = 'AAAAKeEx290:APA91bFLTYQgLE3wxi9vzshm_Z5upOllIOWmTFfczdHAU_pGjqmzjmeNEU4f3AaCOCKbHR8z3OGJpxVCTpyQc1pJpO_0Ph47KkmcC69hqTTim4rItY6-xvBnF59-B68sqiAtN_aHzphF';
    
            $data = [
                "registration_ids" => $FcmToken,
                "notification" => [
                    "title" => 'Ada Pesanan',
                    "body" => 'Ada Pesanan Baru',  
                ]
            ];
            $encodedData = json_encode($data);
        
            $headers = [
                'Authorization:key=' . $serverKey,
                'Content-Type: application/json',
            ];
        
            $ch = curl_init();
        
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }        
            // Close connection
            curl_close($ch);

            Cart::destroy();

            return 'sesuai';

            // $wa = [
            //     'api_key' => 'E83hJoTofwANJ1Y34HEURbWkYYXAW9',
            //     'sender'  => '62895704893952',
            //     'number'  => '62895704893952',
            //     'message' => 'PERHATIAN!!! Ada '.Cart::count().' pesanan baru dari '.$costumer->nama.'. Harap respon pesanan secepatnya',
            // ];
            
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://wagw.kebabyasmin.id/send-message',
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'POST',
            //     CURLOPT_POSTFIELDS => json_encode($wa),
            //     CURLOPT_HTTPHEADER => array(
            //       'Content-Type: application/json'
            //     ),
            //   ));
            
            // $response = curl_exec($curl);
            
            // curl_close($curl);
            // $hasil = json_decode($response, TRUE);
            
            // if($hasil['status'] == true){
            //     Cart::destroy();
    
            //     return 'sesuai';
            // }else{
            //     return 'sesuai';
            // }

            
            }else{
                return 'kososng';
            }
            
        }else{
            $request->session()->put('nama_sementara',$request->nama);
            $request->session()->put('nomor_sementara',$request->nomor);
            $request->session()->put('alamat_sementara',$request->alamat);

            $request->session()->forget('nama');
            $request->session()->forget('nomor');
            $request->session()->forget('alamat');

            return 'tidak';
        }        
        
    }
    public function redirectTransaksi(){
        return redirect(route('transaksi'))->with('success','Pesanan berhasil dibuat, tunggu beberapa saat dan penjual akan menghubungi anda');
        }

        public function redirectCheckout(Request $request)
        {
            if(Cart::count() != 0){
                $cart = Cart::content();
                $costumer = Costumer::where('no_tlp','=',$request->session()->get('nomor'))->first();
                $no_invoice = 'INV'.date('dmy').strtoupper(Str::random(5));
                $total_invoice = 0;
                $tgl = date('Y-m-d');
        
                foreach($cart as $c){

                $total_varian = 0;
                if($c->options->dt_varian){
                    foreach($c->options->dt_varian as $dtv){

                        $total_varian += $dtv['harga'] * $c->qty;

                    }
                }

                $total_penjualan= ($c->qty * $c->price)+$total_varian;

                    $dt_penjualan = [
                        'no_invoice' => $no_invoice,
                        'costumer_id' => $costumer->id,
                        'produk_id' => $c->id,
                        'qty' => $c->qty,
                        'harga' => $c->price,
                        'total' => $total_penjualan,
                        'total_varian' => $total_varian,
                        'ket' => $c->options->ket,
                        'tgl' => $tgl
                    ];
                    $penjualan_id = Penjualan::create($dt_penjualan);

                    if($c->options->saos){
                        $data_penjualan_varian = [
                            'no_invoice' => $no_invoice,
                            'penjualan_id' => $penjualan_id->id,
                            'varian_id' => $c->options->saos,
                            'qty' => $c->qty,
                            'harga' => 0,
                            'tgl' => $tgl
                        ];
                        PenjualanVarianOnline::create($data_penjualan_varian);
                    }

                    if($c->options->dt_varian){
                        foreach($c->options->dt_varian as $dtv){
                            $data_penjualan_varian = [
                                'no_invoice' => $no_invoice,
                                'penjualan_id' => $penjualan_id->id,
                                'varian_id' => $dtv['varian_id'],
                                'qty' => $c->qty,
                                'harga' => $dtv['harga'],
                                'tgl' => $tgl
                            ];
                            PenjualanVarianOnline::create($data_penjualan_varian);
                        }
                    }

                    $total_invoice += $total_penjualan;
                }
        
                $dt_invoice = [
                    'no_invoice' => $no_invoice,
                    'costumer_id' => $costumer->id,
                    'total' => $total_invoice,
                    'no_tlp' => $costumer->no_tlp,
                    'alamat' => $costumer->alamat,
                    'status' => 'Diproses',
                    'tgl' => $tgl,
                    'latitude' => $costumer->latitude,
                    'longitude' => $costumer->longitude,
                ];
                Invoice::create($dt_invoice);

                $url = 'https://fcm.googleapis.com/fcm/send';
                $FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
                
                $serverKey = 'AAAAKeEx290:APA91bFLTYQgLE3wxi9vzshm_Z5upOllIOWmTFfczdHAU_pGjqmzjmeNEU4f3AaCOCKbHR8z3OGJpxVCTpyQc1pJpO_0Ph47KkmcC69hqTTim4rItY6-xvBnF59-B68sqiAtN_aHzphF';
        
                $data = [
                    "registration_ids" => $FcmToken,
                    "notification" => [
                        "title" => 'Ada Pesanan',
                        "body" => 'Ada Pesanan Baru',  
                    ]
                ];
                $encodedData = json_encode($data);
            
                $headers = [
                    'Authorization:key=' . $serverKey,
                    'Content-Type: application/json',
                ];
            
                $ch = curl_init();
            
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                // Disabling SSL Certificate support temporarly
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
                // Execute post
                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('Curl failed: ' . curl_error($ch));
                }        
                // Close connection
                curl_close($ch);

                Cart::destroy();

                return redirect(route('transaksi'))->with('success','Pesanan berhasil dibuat, tunggu beberapa saat dan penjual akan menghubungi anda');

                // $wa = [
                //     'api_key' => 'E83hJoTofwANJ1Y34HEURbWkYYXAW9',
                //     'sender'  => '62895704893952',
                //     'number'  => '62895704893952',
                //     'message' => 'PERHATIAN!!! Ada '.Cart::count().' pesanan baru dari '.$costumer->nama.'. Harap respon pesanan secepatnya',
                // ];
                
                // $curl = curl_init();
                // curl_setopt_array($curl, array(
                //     CURLOPT_URL => 'https://wagw.kebabyasmin.id/send-message',
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => '',
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 0,
                //     CURLOPT_FOLLOWLOCATION => true,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => 'POST',
                //     CURLOPT_POSTFIELDS => json_encode($wa),
                //     CURLOPT_HTTPHEADER => array(
                //       'Content-Type: application/json'
                //     ),
                //   ));

                //   $response = curl_exec($curl);
            
                // curl_close($curl);
                // $hasil = json_decode($response, TRUE);
        
                // if($hasil['status'] == true){
                //     Cart::destroy();
        
                //     return redirect(route('transaksi'))->with('success','Pesanan berhasil dibuat, tunggu beberapa saat dan penjual akan menghubungi anda');
                // }else{
                //     return redirect(route('transaksi'))->with('success','Pesanan berhasil dibuat, tunggu beberapa saat dan penjual akan menghubungi anda');
                // }
        
                
                }else{
                    return redirect(route('landing'));
                }
        }

        public function detail(Request $request)
        {
            $inv = $request->inv;
            $penjualan = Penjualan::select('*','penjualan.harga as harga_jual')->leftJoin('produk','penjualan.produk_id','=','produk.id')->where('penjualan.no_invoice','=',$inv)->get();

            $data = [
                'penjualan' => $penjualan
            ];
            return view('component.detail',$data);
        }
}
