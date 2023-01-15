<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    public function characters(){
        return $this->belongsToMany(Character::class);
    }

    public function works(){
        return $this->belongsToMany(Work::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
