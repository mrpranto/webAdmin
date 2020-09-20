<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $guarded = ['id'];

    public function customizeBanner()
    {
        return $this->hasOne(customize_banner::class,'ads_id','id');
    }

    public function display_type()
    {
        return $this->belongsTo(DisplayType::class,'display_type_id','id');
    }
}
