<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class texts extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'template_id'
    ];

    public function template(){
        return $this->belongsTo(templates::class, 'template_id');
    }
}
