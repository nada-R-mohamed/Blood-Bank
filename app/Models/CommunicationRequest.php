<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class CommunicationRequest extends Model
{
    protected $fillable = ['title', 'content', 'is_done', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function scopeDone($query)
    {
        return $query->where('is_done', 1);
    }

    public function scopePending($query)
    {
        return $query->where('is_done', 0);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
                ->orWhere('content', 'like', "%{$term}%");
        });
    }
}
