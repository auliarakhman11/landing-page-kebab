<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Contact');
        SEOMeta::setDescription('The Best Snack In The Night');
        SEOMeta::setCanonical(route('contact'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('The Best Snack In The Night');
        OpenGraph::setTitle('Contact');
        OpenGraph::setUrl(route('contact'));
        OpenGraph::addImage(asset('auth').'/images/kebabyasmin-removebg.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Contact');
        TwitterCard::setDescription('The Best Snack In The Night');
        TwitterCard::setUrl(route('contact'));

        JsonLd::setTitle('Contact');
        JsonLd::setDescription('The Best Snack In The Night');
        JsonLd::addImage(asset('auth').'/images/kebabyasmin-removebg.png');
        $data = [
            // 'title' => 'Kebab Yasmin | Contact',
        ];
        return view('page.contact',$data);
    }
}
