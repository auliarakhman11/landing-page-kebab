<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;

    protected $table = 'varian';

    public function kategoriVarian()
    {
        return $this->belongsTo(KategoriVarian::class,'kategori_varian_id','id');
    }
}
