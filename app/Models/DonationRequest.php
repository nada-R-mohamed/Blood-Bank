<?php

namespace App\Models;

use App\Models\City;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $fillable = ['patient_name', 'patient_age', 'patient_phone', 'hospital_name', 'hospital_address', 'city_id', 'blood_type_id', 'bags_num', 'details', 'latitude', 'longitude'];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }
    //city
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    //notifications
    public function notifications()
    {
    return $this->hasMany(Notification::class);
    }
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('patient_name', 'like', "%{$term}%")
                ->orWhere('patient_phone', 'like', "%{$term}%")
                ->orWhere('hospital_name', 'like', "%{$term}%")
                ->orWhere('hospital_address', 'like', "%{$term}%")
                ->orWhere('details', 'like', "%{$term}%");
        });
    }

    public function scopeBloodType($query, $bloodTypeId)
    {
        return $query->where('blood_type_id', $bloodTypeId);
    }

    public function scopeCity($query, $cityId)
    {
        return $query->where('city_id', $cityId);
    }
}
