<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    public function saveJob($id)
    {
        $jobId = Job::find($id);
        $jobId->favourites()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unsavedJob($id)
    {
        $jobId = Job::find($id);
        $jobId->favourites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
