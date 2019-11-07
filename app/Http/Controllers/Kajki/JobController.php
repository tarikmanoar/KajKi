<?php

namespace App\Http\Controllers\KajKi;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer', ['except' => ['index', 'show', 'apply']]);
    }

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
        return view('jobs.create');

    }

    public function myJobs()
    {
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('jobs.myjobs', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
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
        $data      = [
            'category_id' => $request->get('category_id'),
            'title'       => $title = $request->get('title'),
            'slug'        => str_slug($title),
            'description' => $request->get('description'),
            'position'    => $request->get('position'),
            'roles'       => $request->get('roles'),
            'address'     => $request->get('address'),
            'job_type'    => $request->get('job_type'),
            'status'      => $request->get('status'),
            'last_date'   => $request->get('last_date'),
            'updated_at'  => date("Y-m-d h:i:s")
        ];
        $jobUpdate = Job::findOrFail($id);
        $jobUpdate->update($data);
        $this->setSuccessMsg("Job Updated Successfully!");
        return redirect()->route('jobs.myJobs');
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

//================
//Apply Job Controller
//================
    public function apply(Request $request, $id)
    {
        $job_id = Job::find($id);
        $job_id->users()->attach(auth()->user()->id);
        $this->setSuccessMsg("Application Sent!");
        return redirect()->back();
    }

    public function applicant()
    {
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicant',compact('applicants'));
    }
}
