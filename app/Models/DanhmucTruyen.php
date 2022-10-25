<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc', 'mota', 'kichhoat', 'slugdanhmuc'
    ];
    protected $primarykey = 'id';
    protected $table = 'danhmuc';
}
