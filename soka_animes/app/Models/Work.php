<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'release_date',
        'chapters',
        'volumes',
        'synopsis',
        'producer',
        'status',
        'author',
        'image',
        'type'
    ];

    public function characters(){
        return $this->belongsToMany(Character::class);
    }

    public function genders(){
        return $this->belongsToMany(Gender::class);
    }

    public function posts(){
           return $this->belongsToMany(Post::class);
    }
}
