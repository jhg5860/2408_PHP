<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardsCategory extends Model
{

    protected $table = "boards_category";
    protected $primaryKey ="bc_id";

    protected $filable = [
        'bc_type'
        ,'bc_name'
    ];
}
