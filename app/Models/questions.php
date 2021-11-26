<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'course_id'
    ];

    public function course(){
        return $this->belongsTo(course::class, 'course_id');
    }
}
