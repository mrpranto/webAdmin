<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdStatus extends Model
{
    protected $guarded = ['id'];

    public function ad_status_details()
    {
        return $this->hasOne(AdStatusDetails::class,'ad_status_id','id');
    }
}
