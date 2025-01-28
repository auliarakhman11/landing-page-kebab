<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('page.product',['title' => 'Product','kategori' => $kategori]);
    }
}
