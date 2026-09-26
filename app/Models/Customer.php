<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model { protected $guarded=[]; protected $casts=['birthday'=>'date']; public function orders(){return $this->hasMany(Order::class);} public function reservations(){return $this->hasMany(Reservation::class);} }
