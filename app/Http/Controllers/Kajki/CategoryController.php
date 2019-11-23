<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index($id)
    {
        $jobs = Job::where('category_id',$id)->paginate(10);
        $cat = Category::where('id',$id)->first();
        return view('jobs.jobsCategory',compact(['jobs','cat']));
    }
}
