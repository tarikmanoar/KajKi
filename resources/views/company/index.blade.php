@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="company-profile" data-aos="fade-up" data-aos-delay="100">
                    @if(!empty($company->cover_photo))
                        <img src="{{asset('images/uploads/'.$company->cover_photo)}}" alt="Sorry"
                             class="img-fluid" style="height: 376px;width: 100%;">
                    @else
                        <img src="{{asset('avatar/aaa.jpeg')}}" alt="Sorry" class="img-fluid" style="height: 376px;
                        width: 100%;">
                    @endif
                    <div class="company-desc mt-4">
                        @if(!empty($company->logo))
                            <img src="{{asset('images/uploads/'.$company->logo)
                        }}" alt="Sorry" class="img-fluid" style="width: 150px">
                        @else
                            <img src="{{asset('avatar/man.jpg')}}" alt="Sorry" class="img-fluid" style="width: 150px">
                        @endif
                        <p class="mt-4">{{$company->description}}</p>
                        <h1>{{$company->cname}}</h1>
                        <p>Slogan- <strong>{{$company->slogan}}</strong> ;&nbsp;<br> Address- {{$company->address}};&nbsp;
                            Phone- {{$company->phone}};&nbsp; Website- <a href="{{$company->website}}">{{$company->website}}</a></p>
                    </div>
                </div>
                <h1>Recent Jobs</h1>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <div class="rounded border jobs-wrap" data-aos="fade-up" data-aos-delay="100">

                        @foreach($company->jobs as $job)
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
