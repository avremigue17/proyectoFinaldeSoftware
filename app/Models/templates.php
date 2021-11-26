<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class templates extends Model
{
    use HasFactory;


    protected $fillable = [
        'course_id'
    ];

    public function course(){
        return $this->belongsTo(course::class, 'course_id');
    }

    public function text(){
         return $this->hasMany(texts::class);
    }
}
