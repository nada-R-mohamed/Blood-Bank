<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Governorate;
use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
    //donations
    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }
}
