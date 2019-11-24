<?php

namespace App\Http\Controllers\KajKi;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer', 'verified'], [
            'except' => [
                'index',
                'show',
                'apply',
                'allJobs',
                'search'
            ]
        ]);

    }

    public function index()
    {
        $jobs      = Job::latest()->limit(10)->where('status', 1)->get();
        $companies = Company::get()->random(8);
        $cats      = Category::with('jobs')->get();
        return view('welcome', compact(['jobs', 'companies', 'cats']));
    }

    public function show($id, Job $job)
    {
        $data = [];
        //Jobs Base on Category
        $jobsByCats = Job::latest()
            ->where('category_id', $job->category_id)
            ->where('status', 1)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $job->id)
            ->limit(3)
            ->get();
        array_push($data, $jobsByCats);
        //Jobs Base on Company
        $jobsByComps = Job::latest()
            ->where('company_id', $job->company_id)
            ->where('status', 1)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $job->id)
            ->limit(3)
            ->get();
        array_push($data, $jobsByComps);

        //Jobs Base on Positions
        $jobsByPosition = Job::latest()
            ->where('position', 'LIKE', '%' . $job->position . '%')
            ->where('status', 1)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id', '!=', $job->id)
            ->limit(3)
            ->get();
        array_push($data, $jobsByPosition);
//        dd($data);
        return view('jobs.show', compact('job','jobsByComps','jobsByCats'));
    }

    public function create()
    {
        return view('jobs.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'       => 'required|',
            'title'             => 'required|',
            'description'       => 'required|min:80',
            'position'          => 'required|max:128',
            'roles'             => 'required|',
            'address'           => 'required|',
            'job_type'          => 'required|',
            'status'            => 'required|numeric',
            'number_of_vacancy' => 'required|numeric',
            'experience'        => 'required|numeric',
            'last_date'         => 'required|',
            'gender'            => 'required|',
            'salary'            => 'required|',
        ]);
        $user_id    = auth()->user()->id;
        $company    = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        $data       = [
            'user_id'           => $user_id,
            'company_id'        => $company_id,
            'category_id'       => $request->get('category_id'),
            'title'             => $title = $request->get('title'),
            'slug'              => str_slug($title),
            'description'       => $request->get('description'),
            'position'          => $request->get('position'),
            'roles'             => $request->get('roles'),
            'address'           => $request->get('address'),
            'job_type'          => $request->get('job_type'),
            'status'            => $request->get('status'),
            'last_date'         => $request->get('last_date'),
            'salary'            => $request->get('salary'),
            'gender'            => $request->get('gender'),
            'experience'        => $request->get('experience'),
            'number_of_vacancy' => $request->get('number_of_vacancy'),
        ];
        Job::create($data);
        $this->setSuccessMsg("Job Posted Successfully!");
        return redirect()->back();
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


    public function allJobs(Request $request)
    {
        //Search From Home Page
        $search    = $request->get('search');
        $s_address = $request->get('s_address');
        if ($search && $s_address) {
            $allJobs = Job::where('status', 1)
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('job_type', 'LIKE', '%' . $search . '%')
                ->orWhere('position', 'LIKE', '%' . $search . '%')
                ->orWhere('address', 'LIKE', '%' . $s_address . '%')
                ->paginate(10);

            return view('jobs.allJobs', compact('allJobs'));
        }

        $keyword     = $request->get('title');
        $job_type    = $request->get('job_type');
        $category_id = $request->get('category_id');
        $address     = $request->get('address');
        if ($keyword || $job_type || $category_id || $address) {
            $allJobs = Job::where('status', 1)
                ->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('job_type', $job_type)
                ->orWhere('category_id', $category_id)
                ->orWhere('address', 'LIKE', '%' . $address . '%')
                ->paginate(10);
            return view('jobs.allJobs', compact('allJobs'));
        } else {
            $allJobs = Job::where('status', 1)->paginate(10);
            return view('jobs.allJobs', compact('allJobs'));
        }
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
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('jobs.applicant', compact('applicants'));
    }

//================
//Search Job Controller
//================
    public function search(Request $request)
    {

        $keyword = $request->get('keyword');
        $jobs    = Job::where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('position', 'LIKE', '%' . $keyword . '%')
            ->orWhere('job_type', 'LIKE', '%' . $keyword . '%')
            ->orWhere('address', 'LIKE', '%' . $keyword . '%')
            ->limit(5)->get();
        return response()->json($jobs);
    }
}
