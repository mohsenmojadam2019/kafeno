<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RestaurantTable extends Model { protected $table='tables'; protected $guarded=[]; public function reservations(){return $this->hasMany(Reservation::class,'table_id');} }
