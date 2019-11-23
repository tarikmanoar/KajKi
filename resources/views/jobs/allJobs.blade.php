@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <h1>Recent Jobs ({{count(\App\Models\Job::where('status', 1)->get())}})</h1>
{{--
             <form action="{{route('jobs.allJobs')}}" method="GET" accept-charset="utf-8"
                      enctype="multipart/form-data">
                    <div class="form-inline">
                        <div class="form-group col-lg-3">
                            <label for="keyword" class=" form-control-label">Keyword &nbsp;</label>
                            <input type="text" name="title" id="keyword" class="form-control @error('title')
                                is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="category_id" class=" form-control-label">Category &nbsp;</label>
                            <select name="category_id" id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">-Select-</option>
                                @foreach(App\Models\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="job_type" class=" form-control-label">Job Type &nbsp;</label>
                            <select name="job_type" id="job_type" class="form-control @error('job_type') is-invalid
@enderror">
                                <option value="">-Select-</option>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>
                            </select>

                            @error('job_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="address" class=" form-control-label">Address &nbsp;</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="form-group col-lg-2">
                            <input type="submit" class="btn btn-success" class="form-control" value="Submit">
                        </div>
                    </div>
                </form>--}}
            <search-component></search-component>
                <div class="bg-lights">
                    <div class="container">
                        <div class="row" id="app">
                            <div class="col-md-12 mb-12 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                                <div class="rounded border jobs-wrap">

                                    @foreach($allJobs as $job)
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
                                    {{$allJobs->appends(\Illuminate\Support\Facades\Input::except('page'))->links()}}
                                </span>
                            </div>
                            {{--FEATURE JOBS--}}
                            {{--    <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
                                    <div class="d-flex mb-0">
                                        <h2 class="mb-5 h3 mb-0">Featured Jobs</h2>
                                        <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#"
                                                                                                                    class="owl-custom-next">Next</a>
                                        </div>
                                    </div>

                                    <div class="nonloop-block-16 owl-carousel">

                                        <div class="border rounded p-4 bg-white">
                                            <h2 class="h5">Restaurant Crew</h2>
                                            <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                                            <p>
                                                <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                                                <span class="d-block"><span class="icon-room"></span> Florida</span>
                                                <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                                            </p>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi neque fugit
                                                tempora, numquam voluptate veritatis odit id, iste eum culpa alias, ut officiis omnis
                                                itaque ad, rem sunt doloremque molestias.</p>
                                        </div>

                                        <div class="border rounded p-4 bg-white">
                                            <h2 class="h5">Javascript Fullstack Developer</h2>
                                            <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                                            <p>
                                                <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                                                <span class="d-block"><span class="icon-room"></span> Florida</span>
                                                <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                                            </p>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus accusamus
                                                necessitatibus praesentium voluptate natus excepturi rerum, autem. Magnam laboriosam,
                                                quam sapiente laudantium iure sit ea! Tenetur, quasi, praesentium. Architecto, eum.</p>
                                        </div>

                                        <div class="border rounded p-4 bg-white">
                                            <h2 class="h5">Assistant Brooker, Real Estate</h2>
                                            <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                                            <p>
                                                <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                                                <span class="d-block"><span class="icon-room"></span> Florida</span>
                                                <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                                            </p>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus esse,
                                                quam consectetur ipsum quibusdam ullam ab nesciunt, doloribus voluptatum neque iure
                                                perspiciatis vel vero illo consequatur facilis, fuga nobis corporis.</p>
                                        </div>

                                        <div class="border rounded p-4 bg-white">
                                            <h2 class="h5">Telecommunication Manager</h2>
                                            <p><span class="border border-warning rounded p-1 px-2 text-warning">Freelance</span></p>
                                            <p>
                                                <span class="d-block"><span class="icon-suitcase"></span> Resto Bar</span>
                                                <span class="d-block"><span class="icon-room"></span> Florida</span>
                                                <span class="d-block"><span class="icon-money mr-1"></span> $55000 &mdash; 70000</span>
                                            </p>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid at ipsum
                                                commodi hic, cum esse asperiores libero molestiae, perferendis consectetur assumenda
                                                iusto, dolorem nemo maiores magnam illo laborum sit, dicta.</p>
                                        </div>

                                    </div>

                                </div> --}}
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
