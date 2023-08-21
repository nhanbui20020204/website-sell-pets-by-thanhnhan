<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatController extends Model
{
    use HasFactory;
    protected $table = 'cat_controllers';

    protected $fillable = [
        'ten_thu',
        'slug_thu',
        'hinh_anh',
        'loai',
        'gia_ban',
        'mo_ta',
        'tinh_trang',
    ];
}
