<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey ='b_id';

    protected $filable = [
        'u_id'
        ,'b_id'
        ,'b_title'
        ,'b_content'
        ,'b_img'
    ];

    // laravel에서 json 데이터로 넘겨줄때 utc시간으로 넘겨줘서 맞춤 양식 시간으로 바꿔주는것
    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }
}


