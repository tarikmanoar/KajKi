@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <h1>Recent Jobs</h1>
                <table class="table table-bordered table-striped">
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>
                                @if(!empty($job->company->logo))
                                    <img src="{{asset('images/uploads/'.$job->company->logo)}}" alt="NO" width="80px">
                                @else
                                    <img src="{{asset('avatar/man.jpg')}}" alt="NO" width="80px">
                                @endif
                            </td>
                            <td>Position: {{$job->position}} <br>
                                <i class="fa fa-clock-o"></i>&nbsp; {{$job->job_type}}
                            </td>
                            <td width="300px"><i class="fa fa-map-marker"></i>&nbsp; Address: {{$job->address}}</td>
                            <td><i class="fa fa-globe"></i>&nbsp; Post:{{$job->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success
                            btn-sm">Apply</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="browseAllJobs">
                    <a href="{{route('jobs.allJobs')}}" class="btn btn-lg btn-info" style="width: 100%;">Browse All
                        Jobs</a>
                </div>
                <br>
                <h1> Featured Companies</h1>
            </div>
        </div>
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3 mb-5 justify-content-center">
                <div class="card">
                    <img src="{{asset('images/uploads/'.$company->logo)}}" style="width:150px;text-align: center"
                         class="img-fluid d-flex align-items-center"
                         alt="No Images" >
                    <div class="card-body">
                        <div class="card-title">{{$company->cname}}</div>
                        <div class="card-text">{{str_limit($company->description,80)}}</div>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-sm
                        btn-outline-info mt-3">Visit
                            Company</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .fa {
        color: #2ad;
    }
</style>
