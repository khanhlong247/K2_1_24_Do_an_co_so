<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $table = 'supports'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'name',
        'age',
        'phone',
        'email',
        'message',
    ];
}