<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

     protected $fillable = [
        'image',
        'likes',
        'fecha_de_creacion',
        'user_id',
    ];

   /*public function user(){
        return $this->belongsTo(User::class);
    }*/

    function user()
    {
        return $this->hasone(User::class, 'id', 'user_id'); 
    }
}
