@extends('layouts.main')
@section('content')
    <div class="unit-5 overlay" style="background: url({{$job->company->cover_photo === '' ? asset
    ('external/images/hero_2.jpg') : asset('images/uploads/'.$job->company->cover_photo)}}) no-repeat #22aadd;">
        <div class="container text-center">
            <h2 class="mb-0">{{$job->title}}</h2>
            <p class="mb-0 unit-6"><a href="{{__('/')}}">Home</a> <span class="sep">></span> <span>Job Item</span></p>
        </div>
    </div>
    <div class="site-section bg-light">
        <div class="container" id="app">
            <div class="row" >
                <div class="col-md-12 col-lg-8 mb-5">
                    <div class="p-5 bg-white">
                        <div class="mb-4 mb-md-5 mr-5">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4">{{$job->position}}</h2>
                                <div class="badge-wrap">
                                <span class="border border-warning text-warning py-2 px-4
                                rounded">{{$job->job_type}}</span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span>
                                    <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                                        {{$job->company->cname}}
                                    </a>
                                </div>
                                <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->address}}</span></div>
                            </div>
                        </div>


                        <div class="img-border mb-5">
                            {{--                        <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                                                      <span class="icon-wrap">
                                                        <span class="icon icon-play"></span>
                                                      </span>
                                                    </a>
                            --}}
                            <img
                                src="{{$job->company->logo== '' ? asset('external/images/hero_2.jpg') :asset('images/uploads/'.$job->company->logo)}}"
                                alt="Image"
                                class="img-fluid
                        rounded">
                        </div>
                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Job Description</h3>
                            <p>{{$job->description}}</p>
                        </div>
                        <div class="p-4 mb-8 bg-white">
                            <h3 class="h5 text-black mb-3">Roles & Responsibilities</h3>
                            <p>{{$job->roles}}</p>
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

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">More Info</h3>
                        <p><span class="font-weight-bold text-uppercase">Company:</span>
                            <a href="{{route('company.index',[$job->company->id,$job->company->slug])
                            }}">{{$job->company->cname}} </a>
                        </p>
                        <p><span class="font-weight-bold text-uppercase">Address:</span> {{$job->address}}</p>
                        <p><span class="font-weight-bold text-uppercase">Gender</span> : {{$job->gender}}</p>
                        <p><span class="font-weight-bold text-uppercase">Salary</span> : {{$job->salary}}</p>
                        <p><span class="font-weight-bold text-uppercase">Experience</span> :
                            {{$job->experience}}</p>
                        <p><span class="font-weight-bold text-uppercase">Vacancy</span> :
                            {{$job->number_of_vacancy}}</p>
                        <p><span class="font-weight-bold text-uppercase">Employment</span> Type: {{$job->job_type}}</p>
                        <p><span class="font-weight-bold text-uppercase">Category:</span> {{$job->category->name}} </p>
                        <p><span class="font-weight-bold text-uppercase">Position:</span> {{$job->position}}</p>
                        <p><span class="font-weight-bold text-uppercase">Date:</span>
                            {{$job->created_at->diffForHumans()}}
                        </p>
                        <p><span class="font-weight-bold text-uppercase">Last Date:</span>
                            {{date('F d Y',strtotime($job->last_date))}}</p>
                        <br>
                        <p class="mt-5 "><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}"
                                            class="btn btn-primary  py-2 px-4">Visit Company Page</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade" >
                    <h2>Frequently Ask Questions</h2>
                </div>
            </div>


            <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
                <div class="col-md-8">
                    <div class="accordion unit-8" id="accordion">
                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
                            </h3>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
                            </h3>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
                            </h3>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
                            </h3>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="body-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                    </div>
                </div>
            </div>

        </div>
    </div>
    --}}
@endsection
