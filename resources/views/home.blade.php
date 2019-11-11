@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($jobs as $job)
                    <div class="card">
                        <div class="card-header">{{$job->title}}</div>

                        <div class="card-body">
                            {{$job->description}}
                        </div>
                        <div class="card-footer">
                    <span>
                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success btn-sm">See More</a>
                    </span>
                            <span class="float-right">
                                {{date('F m Y',strtotime($job->last_date))}}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
