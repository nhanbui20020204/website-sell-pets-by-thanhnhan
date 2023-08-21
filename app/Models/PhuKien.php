<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhuKien extends Model
{
    use HasFactory;
    protected $table = 'phu_kiens';

    protected $fillable = [
        'ten_san_pham',
        'slug_san_pham',
        'anh',
        'gia',
        'mieu_ta',
        'trang_thai',
    ];
}
