<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;


class MusicType extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'music_type';

    protected $fillable = [
        
        'category',
    ];
    public function artists(){
        return $this->hasMany(Artists::class);
    }
}
