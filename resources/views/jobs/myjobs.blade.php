@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h1>Recent Jobs</h1></div>

                    @if(session()->has('message'))
                        <div class="alert alert-{{session('type')}} text-uppercase text-center">
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="card-body">
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
                            @foreach($jobs as $job)
                                <tr>
                                    <td>@if(!empty(auth()->user()->company->logo))
                                            <img src="{{asset('images/uploads/'.auth()->user()->company->logo)
                        }}" alt="Sorry" class="img-fluid" style="width: 150px">
                                        @else
                                            <img src="{{asset('avatar/man.jpg')}}" alt="Sorry" class="img-fluid"
                                                 style="width: 150px">
                                        @endif
                                    </td>
                                    <td>Position: {{$job->position}} <br>
                                        <i class="fa fa-clock-o"></i>&nbsp; {{$job->job_type}}
                                    </td>
                                    <td width="300px"><i class="fa fa-map-marker"></i>&nbsp; Address: {{$job->address}}
                                    </td>
                                    <td><i class="fa fa-globe"></i>&nbsp; Post:{{$job->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-success
                           "><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
