<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsQueue extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates=['schedule_datetime','delivered_at'];

    protected $fillable=['body','message_id','device_unique_id','from','schedule_datetime','to','schedule_completed','campaign_id','message_files','delivered_at','response_code','response_id','status','subscriber_id'];

    public function user(){
        return $this->belongsTo(Customer::class,'customer_id')->withDefault();
    }


}
