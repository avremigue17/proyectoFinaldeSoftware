<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function coursePosts(){
         return $this->hasMany(CoursePosts::class);
    }

    public function records(){
         return $this->hasMany(records::class);
    }
}
