<?php

namespace App\Models;

use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
