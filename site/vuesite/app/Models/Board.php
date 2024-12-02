<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    protected $primaryKey ='board_id';

    protected $fillable = [
            'user_id',
            'content',
            'img',
            'like',
        
    ];

    use HasFactory;

    /**
     * TimeZone format when serializing JSON
     *
     * @param \DateTimeInterface $date
     * 
     * @return String('Y-m-d H:i:s')
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date ->format('Y-m-d H:i:s');       
    }  
}
