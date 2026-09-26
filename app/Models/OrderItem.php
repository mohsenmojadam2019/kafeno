<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderItem extends Model { protected $guarded=[]; protected $casts=['options'=>'array']; public function order(){return $this->belongsTo(Order::class);} public function menuItem(){return $this->belongsTo(MenuItem::class);} }
