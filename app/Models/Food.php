<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'food';

    protected $fillable = [
        'ten_thuc_an',
        'slug_thuc_an',
        'anh',
        'gia',
        'mieu_ta',
        'trang_thai',
    ];
}
