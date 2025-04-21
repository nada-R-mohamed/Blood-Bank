<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class,'favorites');
    }
}
