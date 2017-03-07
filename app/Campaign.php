<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = ['campaign_name', 'campaign_description', 'campaign_url','user_id','start_at'];
}
