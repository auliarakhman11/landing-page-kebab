<?php

namespace App\Http\Controllers;

use App\Models\AccessToken;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Produk;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('Surganya Ngebab!');
        SEOMeta::setCanonical(route('home'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'Surganya Ngebab!', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('Surganya Ngebab!');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl(route('home'));
        OpenGraph::addImage(asset('img').'/kebab-yasmin.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Home');
        TwitterCard::setDescription('Surganya Ngebab!');
        TwitterCard::setUrl(route('home'));

        JsonLd::setTitle('Home');
        JsonLd::setDescription('Surganya Ngebab!');
        JsonLd::addImage(asset('img').'/kebab-yasmin.png');

        $data = [
            'title' => 'Kebab Yasmin | Home',
            'kategori' => Kategori::select('id','kategori')->orderBy('possition','ASC')->get(),
            'produk' => Produk::select('produk.id','produk.kategori_id','produk.nm_produk','produk.foto','harga.harga')->leftJoin('harga','produk.id','=','harga.produk_id')->where('produk.status','ON')->where('produk.hapus',0)->where('harga.delivery_id',1)->where('harga.harga','!=',0)->orderBy('produk.possition','ASC')->groupBy('produk.id')->get(),
        ];

        return view('page.home',$data);
        
    }
    // public function index()
    // {
    //     SEOMeta::setTitle('Home');
    //     SEOMeta::setDescription('The Best Snack In The Night');
    //     SEOMeta::setCanonical(route('home'));
    //     SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

    //     OpenGraph::setDescription('The Best Snack In The Night');
    //     OpenGraph::setTitle('Home');
    //     OpenGraph::setUrl(route('home'));
    //     OpenGraph::addImage(asset('auth').'/kebab-yasmin.png', ['height' => 300, 'width' => 300]);

    //     TwitterCard::setTitle('Home');
    //     TwitterCard::setDescription('The Best Snack In The Night');
    //     TwitterCard::setUrl(route('home'));

    //     JsonLd::setTitle('Home');
    //     JsonLd::setDescription('The Best Snack In The Night');
    //     JsonLd::addImage(asset('auth').'/kebab-yasmin.png');

    //     // $api_url = "https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=IGQVJYd0otOE5SSm9xTFhBWGpFUXJqYUZAiaFF3a2QtSC1xajBwSHRnQUFxbHlKaDh4NEladUdIXzQzM3JsdUpIcjBTclctZA25fMTNJS1NZAMVZAfWmhNcmZALNFQ4dEIyWmxsNUVCQWlRRUpxUjJheVpmNgZDZD";
    //     $dt_token = AccessToken::where('id',1)->first();
    //     $api_url = "https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=".$dt_token->token;
    //     $connection_c = curl_init(); // initializing
    //     curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
    //     curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // Return the result, do not print
    //     curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    //     $json_return = curl_exec( $connection_c ); // Connect and get json data
    //     curl_close( $connection_c ); // Close connection
	// 	$insta = json_decode( $json_return ); // Decode and return
        
    //     // dd($insta->data);

    //     //youtube
    //     $key = "AIzaSyBAfQ4kgZ2q4tv5yIHxHcXrappjPnThgbc";
    //     $base_url = "https:/www.googleapis.com/youtube/v3/";
    //     $chanelId = "UCYE2Pz0GC_ZXPsQW9Wa92rg";
    //     $maxResult = 10;
    //     $API_URL = $base_url . "search?part=snippet&channelId=".$chanelId."&maxResults=".$maxResult."&key=".$key;
        
    //     // $api_url = "https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=IGQVJYZADc3T3k2ZAlM5YzE2TTlhbTVSVHdOeXhnRHRMWjI1NENDYnVrdld0Q0hRdzB3Wkx2ZAkEtSHI5UXlzOUhIUm9jN3BZAUjkzbTdIek9QMjh5bFAxaGpYZATE3cWlMbmRBV00wYW02Qzd5M0RsQlV6cQZDZD";
    //         $connection_c = curl_init(); // initializing
    //         curl_setopt( $connection_c, CURLOPT_URL, $API_URL ); // API URL to connect
    //         curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // Return the result, do not print
    //         curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    //         $json_return = curl_exec( $connection_c ); // Connect and get json data
    //         curl_close( $connection_c ); // Close connection
    //     $youtube = json_decode( $json_return );

    //     // dd($insta);
        
    //     // dd($youtube);

    //     $data = [
    //         // 'title' => 'Kebab Yasmin | Home',
    //         'insta' =>  isset($insta->data) ? $insta->data : '',
    //         'youtube' => isset($youtube->items) ? $youtube->items : '',
    //         'berita' => Post::limit(3)->get()
    //     ];
    //     return view('page.home',$data);
    // }


    // public function refreshToken()
    // {
    //     $dt_token = AccessToken::where('id',1)->first();
    //     $api_url = "https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=".$dt_token->token;
    //     $connection_c = curl_init(); // initializing
    //     curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
    //     curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // Return the result, do not print
    //     curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    //     $json_return = curl_exec( $connection_c ); // Connect and get json data
    //     curl_close( $connection_c ); // Close connection
	// 	$dt_token = json_decode( $json_return ); // Decode and return

        

    //     AccessToken::where('id',1)->update([
    //         'token' => $dt_token->access_token
    //     ]);

    //     // dd($dt_token);

    //     return true;

    // }

}
