<?php

namespace App\Models;

use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\ClientNotification;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function clients(){
        return $this->belongsToMany(Client::class)->withPivot('is_read')->withTimestamps();
    }
    public function donationRequest()
    {
        return $this->belongsTo(DonationRequest::class);
    }
}
