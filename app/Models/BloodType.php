<?php

namespace App\Models;

use App\Models\Client;
use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }
    public function clientNotifications()
    {
        return $this->belongsToMany(Client::class);
    }
    //clients 
    public function clients()
{
    return $this->hasMany(Client::class);
}
}
