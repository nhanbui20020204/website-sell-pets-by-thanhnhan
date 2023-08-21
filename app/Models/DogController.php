<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogController extends Model
{
    use HasFactory;
    protected $table = 'dog_controllers';

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
