<?php

namespace App\Http\Controllers\Kajki;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {
        return $id;
//        $jobs = Job::where('category_id',$id)->first();
//        return view('jobs.jobsCategory',compact('jobs'));
    }
}
