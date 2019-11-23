@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <h1 class="text-uppercase"> <kbd> {{$cat->name}}</kbd> ({{$jobs->count()}})</h1>
                <div class="bg-lights">
                    <div class="container">
                        <div class="row" id="app">
                            <div class="col-md-12 mb-12 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                                <div class="rounded border jobs-wrap">

                                    @foreach($jobs as $job)
                                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}"
                                           class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                                            <div class="company-logo blank-logo text-center text-md-left pl-3">
                                                <img src="{{$job->company->logo== '' ? asset('images/uploads/logo.jpg') :asset
                                ('images/uploads/'.$job->company->logo)}}" alt="Image" class="img-fluid mx-auto">
                                            </div>
                                            <div class="job-details h-100">
                                                <div class="p-3 align-self-center">
                                                    <h3>{{$job->position}}</h3>
                                                    <div class="d-block d-lg-flex">
                                                        <div class="mr-3"><span class="icon-suitcase mr-1"></span>
                                                            {{$job->company->cname}}</div>
                                                        <div class="mr-3"><span class="icon-room mr-1"></span>
                                                            {{Str::limit($job->address,20)}}
                                                        </div>
                                                        <div class="mr-3"><span class="icon-money mr-1"></span>
                                                            ${{$job->salary}}
                                                        </div>
                                                        <div><span
                                                                class="icon-transgender mr-1"></span> {{$job->gender}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="job-category align-self-center">
                                                <div class="p-3">
                                                    @if($job->job_type === 'Full Time')
                                                        <span
                                                            class="text-info p-2 rounded border border-info">Full Time</span>
                                                    @elseif($job->job_type === 'Part Time')
                                                        <span class="text-warning p-2 rounded border border-warning">Part Time</span>
                                                    @else
                                                        <span class="text-success p-2 rounded border border-success">Casual</span>

                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                                <span style="display: flex;justify-content: center;" class="mt-3">
                                    {{$jobs->links()}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .fa {
        color: #2ad;
    }
</style>
