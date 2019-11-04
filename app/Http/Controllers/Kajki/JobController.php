<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all()->take(10);
        return view('welcome',compact('jobs'));
    }

    public function show($id,Job $job)
    {
        return view('jobs.show',compact('job'));
    }
}
