<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePosts extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'post_id',
    ];

    public function course(){
        return $this->belongsTo(course::class, 'course_id');
    }

    public function posts(){
        return $this->belongsTo(Posts::class);
    }
}
