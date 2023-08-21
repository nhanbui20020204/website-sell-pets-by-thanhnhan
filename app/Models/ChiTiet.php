<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTiet extends Model
{
    use HasFactory;
    protected $table = 'chi_tiets';

    protected $fillable = [
        'ten_thu',
        'hinh_anh',
        'gia_ban',
        'mo_ta',
        'tinh_trang',
    ];
}
