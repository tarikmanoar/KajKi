<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all()->take(10);
        return view('welcome', compact('jobs'));
    }

    public function show($id, Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        if (auth()->user()->role == 'employer') {
            return view('jobs.create');
        }else{
            return redirect()->to('/');
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|',
            'title'       => 'required|min:36',
            'description' => 'required|min:80',
            'position'    => 'required|max:128',
            'roles'       => 'required|',
            'address'     => 'required|',
            'job_type'    => 'required|',
            'status'      => 'required|numeric',
            'last_date'   => 'required|',
        ]);
        $user_id    = auth()->user()->id;
        $company    = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        $data       = [
            'user_id'     => $user_id,
            'company_id'  => $company_id,
            'category_id' => $request->get('category_id'),
            'title'       => $title = $request->get('title'),
            'slug'        => str_slug($title),
            'description' => $request->get('description'),
            'position'    => $request->get('position'),
            'roles'       => $request->get('roles'),
            'address'     => $request->get('address'),
            'job_type'    => $request->get('job_type'),
            'status'      => $request->get('status'),
            'last_date'   => $request->get('last_date')
        ];
        Job::create($data);
        $this->setSuccessMsg("Job Posted Successfully!");
        return redirect()->back();
    }
}
