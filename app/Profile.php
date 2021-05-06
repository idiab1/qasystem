<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'gender', 'address', 'bio', 'facebook_url', 'linkedin_url'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
