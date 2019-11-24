@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($jobs->count() > 0)
                <div class="card">
                    <div class="card-header bg-warning text-dark"><h1>Active Jobs</h1></div>

                    @if(session()->has('message'))
                        <div class="alert alert-{{session('type')}} text-uppercase text-center">
                            {{session('message')}}
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
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
                                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-info"><i class="icon-eye"></i></a>
                                        <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-success float-left"><i  class="icon-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                @else
                    <h1 class="text-uppercase text-center display-2 text-warning bg-info font-weight-bold">NO JOBS!</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
