<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class Album extends Model
{
    protected $fillable = ['name'];

    public function image()
    {
        return $this->hasOne(Image::class,'album_id');
    }
}
