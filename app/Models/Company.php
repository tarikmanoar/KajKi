<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'cname', 'user_id', 'slug', 'email', 'address', 'phone', 'website', 'logo', 'cover_photo', 'slogan', 'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
