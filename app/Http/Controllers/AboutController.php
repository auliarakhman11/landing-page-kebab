<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('About');
        SEOMeta::setDescription('The Best Snack In The Night');
        SEOMeta::setCanonical(route('about'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('The Best Snack In The Night');
        OpenGraph::setTitle('About');
        OpenGraph::setUrl(route('about'));
        OpenGraph::addImage(asset('auth').'/images/kebabyasmin-removebg.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('About');
        TwitterCard::setDescription('The Best Snack In The Night');
        TwitterCard::setUrl(route('about'));

        JsonLd::setTitle('About');
        JsonLd::setDescription('The Best Snack In The Night');
        JsonLd::addImage(asset('auth').'/images/kebabyasmin-removebg.png');

        $data = [
            // 'title' => 'Kebab Yasmin | About'
            
        ];
        return view('page.about',$data);
    }
}
