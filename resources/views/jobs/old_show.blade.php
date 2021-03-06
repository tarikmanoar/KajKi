@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @if(session()->has('message'))
                    <div class="alert alert-{{session('type')}} text-center text-uppercase">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">
                        <h3>Description</h3>
                        <p>{{$job->description}}</p>
                        <h3>Duties</h3>
                        <p>{{$job->roles}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Details</div>

                    <div class="card-body">
                        <p> <span class="font-weight-bold text-uppercase">Company:</span>
                            <a href="{{route('company.index',[$job->company->id,$job->company->slug])
                            }}">{{$job->company->cname}} </a>
                        </p>
                        <p> <span class="font-weight-bold text-uppercase">Address:</span> {{$job->address}}</p>
                        <p> <span class="font-weight-bold text-uppercase">Employment</span>  Type: {{$job->job_type}}</p>
                        <p> <span class="font-weight-bold text-uppercase">Company:</span>  {{$job->category->name}} </p>
                        <p> <span class="font-weight-bold text-uppercase">Position:</span>  {{$job->position}}</p>
                        <p> <span class="font-weight-bold text-uppercase">Date:</span>  {{$job->created_at->diffForHumans()}}</p>
                        <p> <span class="font-weight-bold text-uppercase">Last Date:</span>
                            {{date('F d Y',strtotime($job->last_date))}}</p>
                    </div>
                    <br>
                    @if(Auth::check() && Auth::user()->role=='seeker')
                    @if(!$job->checkApplication())
                            <apply-component jobid={{$job->id}} ></apply-component>
                    @endif
                        <br>
                        <favourites-component jobid={{$job->id}} :favourite={{$job->checkSaved()?'true':'false'}}></favourites-component>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
