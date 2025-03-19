<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artists extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'artists';
    protected $fillable = [
        'name',
        'music_type_id',
    ];
    public function music(){
        return $this->belongsTo(MusicType::class, 'music_type_id');
    }
    
    public function festivals(){
        return $this->hasMany(Festivals::class);
    }
}
