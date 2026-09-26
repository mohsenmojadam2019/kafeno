<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class EventPackage extends Model { protected $guarded=[]; protected $casts=['features'=>'array','is_active'=>'boolean']; }
