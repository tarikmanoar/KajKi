<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication()
    {
       return DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }

    public function checkSaved()
    {
       return DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }

    public function favourites()
    {
        return $this->belongsToMany(User::class,'favourites','job_id','user_id')->withTimestamps();
    }
}
