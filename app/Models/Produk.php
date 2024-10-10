<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class)->withTrashed();
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
