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
        SEOMeta::setTitle('Outlet');
        SEOMeta::setDescription('Surganya Ngebab!');
        SEOMeta::setCanonical(route('outlet'));
        SEOMeta::addKeyword(['Kebab', 'Kebab Yasmin', 'Surganya Ngebab!', 'Jajanan', 'Makanan', 'Makana dan Minuman', 'Banjarmasin', 'Kalsel', 'Kalimantan Selatan', 'Kekinian', 'Maknan Kekinian', 'Jajanan Malam', 'Makanan Malam']);

        OpenGraph::setDescription('Surganya Ngebab!');
        OpenGraph::setTitle('Outlet');
        OpenGraph::setUrl(route('outlet'));
        OpenGraph::addImage(asset('img').'/kebab-yasmin.png', ['height' => 300, 'width' => 300]);

        TwitterCard::setTitle('Outlet');
        TwitterCard::setDescription('Surganya Ngebab!');
        TwitterCard::setUrl(route('outlet'));

        JsonLd::setTitle('Outlet');
        JsonLd::setDescription('Surganya Ngebab!');
        JsonLd::addImage(asset('img').'/kebab-yasmin.png');
        $data = [
            'title' => 'Kebab Yasmin | Outlet',
            'outlet' => Outlite::where('off',0)->where('kota_id','!=',4)->orderBy('possition','ASC')->get()
        ];
        return view('page.outlite',$data);
    }
}
