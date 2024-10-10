<?php

namespace App\Models;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopUp extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'topups';

    public function Wallet()
    {
        return $this->belongsTo(Wallet::class, 'rekening', 'rekening');
    }
}
