<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    // const UPDATED_AT = 'update_time';
    public $timestamps = true;
    protected $fillable = [
        'truyen_id', 'tieude', 'noidung', 'kichhoat', 'slug_chapter',
    ];
    protected $primarykey = 'id';
    protected $table = 'chapter';

    public function truyen(){
        return $this->belongsTo('App\Models\Truyen');

    }
}
