<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MenuItem extends Model { protected $guarded=[]; protected $casts=['tags'=>'array','allergens'=>'array','is_available'=>'boolean','is_featured'=>'boolean']; public function category(){return $this->belongsTo(Category::class);} }
