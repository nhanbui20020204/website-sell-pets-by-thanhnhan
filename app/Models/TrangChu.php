<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangChu extends Model
{
    use HasFactory;
    protected $table = 'trang_chus';

    protected $fillable = [
        'id_san_pham',
        'ten_thu',
        'slug_thu',
        'hinh_anh',
        'loai',
        'gia_ban',
        'mo_ta',
        'tinh_trang',
    ];
}
