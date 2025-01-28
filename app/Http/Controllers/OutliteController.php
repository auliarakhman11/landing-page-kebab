<?php

namespace App\Http\Controllers;

use App\Models\Outlite;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;

class OutliteController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Outlite');
        SEOMeta::setDescription('The Best Snack In The Night');
        SEOMeta::setCanonical(route('outlite'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'The Best Snack In The Night', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('The Best Snack In The Night');
        OpenGraph::setTitle('Outlite');
        OpenGraph::setUrl(route('outlite'));
        OpenGraph::addImage(asset('auth').'/images/kebabyasmin-removebg.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Outlite');
        TwitterCard::setDescription('The Best Snack In The Night');
        TwitterCard::setUrl(route('outlite'));

        JsonLd::setTitle('Outlite');
        JsonLd::setDescription('The Best Snack In The Night');
        JsonLd::addImage(asset('auth').'/images/kebabyasmin-removebg.png');
        $data = [
            // 'title' => 'Kebab Yasmin | Outlite',
            'outlite' => Outlite::all()
        ];
        return view('page.outlite',$data);
    }
}
