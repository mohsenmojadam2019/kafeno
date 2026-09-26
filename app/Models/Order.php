<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model { protected $guarded=[]; protected $casts=['subtotal'=>'integer','delivery_fee'=>'integer','tax'=>'integer','total'=>'integer']; public function items(){return $this->hasMany(OrderItem::class);} public function customer(){return $this->belongsTo(Customer::class);} }
