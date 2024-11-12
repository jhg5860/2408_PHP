<?php

namespace App\Models;

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
}


