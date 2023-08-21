<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';

    protected $fillable = [
        'ten_san_pham',
        'slug_san_pham',
        'anh',
        'gia',
        'mieu_ta',
        'trang_thai',
    ];
}
