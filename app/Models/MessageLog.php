<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageLog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=['body','message_id','device_unique_id','queue_id','customer_id','from','type','message_obj','to','schedule_completed','campaign_id','message_files','status','response_code','response_id','sim_info'];

    public function user(){
        return $this->belongsTo(Customer::class,'customer_id')->withDefault();
    }
    public function send_device(){
        return $this->belongsTo(Device::class,'from','id')->withDefault();
    }
    public function received_device(){
        return $this->belongsTo(Device::class,'to','id')->withDefault();
    }
}
