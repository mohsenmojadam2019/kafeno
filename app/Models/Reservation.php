<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Reservation extends Model { protected $guarded=[]; protected $casts=['date'=>'date']; public function customer(){return $this->belongsTo(Customer::class);} public function table(){return $this->belongsTo(RestaurantTable::class,'table_id');} }
