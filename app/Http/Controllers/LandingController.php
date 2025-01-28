<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\KategoriVarian;
use App\Models\Post;
use App\Models\Produk;
use App\Models\Varian;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Produk');
        SEOMeta::setDescription('The Best Snack In The Night');
        SEOMeta::setCanonical(route('product'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('The Best Snack In The Night');
        OpenGraph::setTitle('Produk');
        OpenGraph::setUrl(route('product'));
        OpenGraph::addImage(asset('auth').'/images/kebabyasmin-removebg.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Produk');
        TwitterCard::setDescription('The Best Snack In The Night');
        TwitterCard::setUrl(route('product'));

        JsonLd::setTitle('Produk');
        JsonLd::setDescription('The Best Snack In The Night');
        JsonLd::addImage(asset('auth').'/images/kebabyasmin-removebg.png');

        $data = [
            // 'title' => 'Kebab Yasmin',
            'produk' => Produk::select('*','produk.id as id')->leftJoin('kategori','produk.kategori_id','=','kategori.id')->leftJoin('produk_kota','produk_kota.produk_id','=','produk.id')->leftJoin('harga','produk.id','=','harga.produk_id')->where('harga.delivery_id','=',1)->where('produk_kota.kota_id',1)->groupBy('produk.id')->orderBy('produk.possition','ASC')->get(),
            'kategori' => Kategori::all(),
            'ketegori_varian' => KategoriVarian::with('getVarian')->get(),
            'post' => Post::orderBy('id','DESC')->limit(3)->get(),
        ];
        return view('page.landing',$data);
    }

    public function getProduk(Request $request)
    {
        $id_produk = $request->id_produk;

        $dt_produk = Produk::select('*','produk.id as id')->leftJoin('harga','produk.id','=','harga.produk_id')->where('produk.id','=',$id_produk)->where('harga.delivery_id','=',1)->first();

        $output = [];
     
        $output['id_produk']= $dt_produk->id;
        $output['nm_produk']= $dt_produk->nm_produk;
        $output['foto']= $dt_produk->foto;
        $output['harga']= $dt_produk->harga;
     
     echo json_encode($output);

    }

    public function addCart(Request $request)
    {
        $id_produk = $request->id_produk;
        $qty = $request->qty;

       

        if($qty > 0 && $request->saos){
            $tambahan = $request->tambahan;
            $dt_varian = [];

            $dt_saos = Varian::where('id',$request->saos)->first();
            $nm_saos = $dt_saos->nm_varian;

            if($tambahan){
                foreach($tambahan as $v){
                    $dtv = [];
                    $data_v = Varian::where('id',$v)->first();
                    $dtv ['varian_id'] = $data_v->id;
                    $dtv ['nm_varian'] = $data_v->nm_varian;
                    $dtv ['kategori_varian_id'] = $data_v->kategori_varian_id;
                    $dtv ['harga'] = $data_v->harga;
                    $dt_varian [] = $dtv;
                }
            }
            
            $dt_produk = Produk::select('*','produk.id as id_produk')->leftJoin('harga','produk.id','=','harga.produk_id')->where('produk.id','=',$id_produk)->where('harga.delivery_id','=',1)->first();

            

            Cart::add(['id' => $dt_produk->id_produk, 'name' => $dt_produk->nm_produk, 'qty' => $qty, 'price' => $dt_produk->harga, 'options' => ['foto' => $dt_produk->foto, 'saos' => $request->saos, 'nm_saos' => $nm_saos, 'ket' => $request->ket, 'dt_varian' => $dt_varian] ]);
            
            return 'success';

        }else{
            if($qty <= 0){
                return 'qty';
            }elseif(!$request->saos){
                return 'saos';
            }else{
                return 'masalah';
            }
        }

        
    }

    public function loadCart()
    {
        // Cart::destroy();
        $data = [
            'cart' => Cart::content(),
            'total' => Cart::subtotal()
        ];
        return view('component.cart',$data);
    }

    public function loadCount()
    {
        return Cart::count();
    }
}
