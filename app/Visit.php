<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = ['referrer', 'url', 'ip','user_id','campaign_id'];
}
