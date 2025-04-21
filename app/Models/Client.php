<?php

namespace App\Models;

use App\Models\City;
use App\Models\Article;
use App\Models\BloodType;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\DonationRequest;
use App\Models\ClientNotification;
use App\Models\CommunicationRequest;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',    
        'phone',
        'password',
        'blood_type_id',
        'city_id',
        'last_donation_date'
       
    ];
    public function communicationRequests(){
        
        return $this->hasMany(CommunicationRequest::class);
    }
    public function city (){
        return $this->belongsTo(City::class);
    }
    public function donationRequests()
    {
        return $this->hasMany(DonationRequest::class);
    }
    public function notifications()
    {
        return $this->belongsToMany(Notification::class)->withPivot('is_read')->withTimestamps();
    }
    public function articles(){
        return $this->belongsToMany(Article::class , 'favorites')->withTimestamps();
    }
    public function governorates()
    {
        return $this->belongsToMany(Governorate::class, 'client_governorate');
    }
    public function bloodTypeNotifications()
    {
        return $this->belongsToMany(BloodType::class);
    }
    //blood types
    public function bloodType()
    {
    return $this->belongsTo(BloodType::class);
    }

}
