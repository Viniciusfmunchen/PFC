<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'name'
    ];

    public function works(){
        return $this->belongsToMany(Work::class);
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
