<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequests extends Model {
  use SoftDeletes;

  const STATUS_NEW = 'new';
  const STATUS_PICKUP_READY = 'ready for pickup';
  const STATUS_WAITING_ON_PARTS = 'waiting on parts';
  const STATUS_CLOSED = 'closed';

  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];
  protected $attributes = [
    'status' => self::STATUS_NEW,    
  ];

  public function vehicleModel(){
    return $this->belongsTo("App\Models\VehicleModels");
  }
}
