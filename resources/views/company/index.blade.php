@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="company-profile">
                    <img src="{{asset('avatar/aaa.jpeg')}}" alt="SORRY" class="img-fluid" width="100%">
                    <div class="company-desc">
                        <img src="{{asset('avatar/masroom.jpg')}}" alt="SORRY" width="80px">
                        <p>{{$company->description}}</p>
                        <h1>{{$company->cname}}</h1>
                        <p>Slogan- {{$company->slogan}};&nbsp; Address- {{$company->address}};&nbsp;
                            Phone- {{$company->phone}};&nbsp; Website- {{$company->website}}</p>
                    </div>
                </div>
                <h1>Recent Jobs</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($company->jobs as $job)
                        <tr>
                            <td><img src="{{asset('avatar/man.jpg')}}" alt="NO" width="80px"></td>
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
            </div>
        </div>
    </div>
@endsection
