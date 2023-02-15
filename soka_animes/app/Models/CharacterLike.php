<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterLike extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'character_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function character(){
        return $this->belongsTo(Character::class);
    }


}
