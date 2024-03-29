<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class records extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'course_id',
        'post_id'
    ];

    public function course(){
        return $this->belongsTo(course::class, 'course_id');
    }
}
