@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                @if(auth()->user()->role=="seeker")
                @foreach($jobs as $job)
                    <div class="card">
                        <div class="card-header">{{$job->title}}</div>
                        <small class="badge badge-info float-left">{{$job->position}}</small>
                        <div class="card-body">
                            {{$job->description}}
                        </div>
                        <div class="card-footer">
                            <span>
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success btn-sm">
                                See More
                            </a>
                            </span>
                            <span class="float-right">
                                {{date('F m Y',strtotime($job->last_date))}}
                            </span>
                        </div>
                    </div><br>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
