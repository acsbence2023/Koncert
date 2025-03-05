<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Festivals extends Model
{
   use HasFactory, Notifiable;
   protected $table = 'festivals';
   protected $fillable = ['name', 'date', 'price', 'city_id', 'artists_id'];

}
