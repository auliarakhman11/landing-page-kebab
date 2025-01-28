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
        SEOMeta::setDescription('Suganya Ngebab!');
        SEOMeta::setCanonical(route('about'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'Suganya Ngebab!', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('Suganya Ngebab!');
        OpenGraph::setTitle('About');
        OpenGraph::setUrl(route('about'));
        OpenGraph::addImage(asset('img').'/kebab-yasmin.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('About');
        TwitterCard::setDescription('Suganya Ngebab!');
        TwitterCard::setUrl(route('about'));

        JsonLd::setTitle('About');
        JsonLd::setDescription('Suganya Ngebab!');
        JsonLd::addImage(asset('img').'/kebab-yasmin.png');

        $data = [
            'title' => 'Kebab Yasmin | About'
        ];
        return view('page.about',$data);
    }
}
