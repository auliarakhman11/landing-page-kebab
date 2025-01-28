<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function __construct()
    // {
        
    // }

    public function index()
    {
        SEOMeta::setTitle('Cart');
        SEOMeta::setDescription('The Best Snack In The Night');
        SEOMeta::setCanonical(route('cart'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('The Best Snack In The Night');
        OpenGraph::setTitle('Cart');
        OpenGraph::setUrl(route('cart'));
        OpenGraph::addImage(asset('auth').'/images/kebabyasmin-removebg.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Cart');
        TwitterCard::setDescription('The Best Snack In The Night');
        TwitterCard::setUrl(route('cart'));

        JsonLd::setTitle('Cart');
        JsonLd::setDescription('The Best Snack In The Night');
        JsonLd::addImage(asset('auth').'/images/kebabyasmin-removebg.png');
        $data = [
            // 'title' => 'Kebab Yasmin | Cart',     
        ];
        return view('page.cartpage',$data);
    }


    public function loadTableCart()
    {
        $dt_cart = Cart::content();
        // $dt_subtotal = Cart::subtotal();
        $dt_subtotal = 0;
        foreach($dt_cart as $c){
            $dt_subtotal += ($c->qty * $c->price);
            if($c->options->dt_varian){
                foreach ($c->options->dt_varian as $dtv){
                    $dt_subtotal += $dtv['harga'];
                }
            }
        }
        $data_table = [
            'cart' => $dt_cart
        ];
        $table = view('component.tablecart',$data_table)->render();

        $data_cart = [
            'cart' => $dt_cart,
            'total' => $dt_subtotal
        ];
        $cart =  view('component.cart',$data_cart)->render();

        

    //     $output = [];
     
    //     $output['cart']= $cart;
    //     $output['table']= $table;
    //     $output['count']= Cart::count();
     
    //  return json_encode($output);

     return response()->json([
         'cart'=>$cart,
         'table' => $table,
         'count' => Cart::count(),
         'subtotal' => $dt_subtotal
         ]);
    }

    public function plusQty(Request $request)
    {
        $cart = Cart::get($request->rowId);
        Cart::update($request->rowId, ['qty' => $cart->qty + 1]);
        return 'success';
    }

    public function minQty(Request $request)
    {
        $cart = Cart::get($request->rowId);
        Cart::update($request->rowId, ['qty' => $cart->qty - 1]);
        return 'success';
    }

    public function subtotal()
    {
        return Cart::subtotal();
    }
}
