@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <h1><kbd>Companies</kbd> ({{$companies->count()}})</h1>
                <div class="bg-lights">
                    <div class="container">
                        <div class="row" id="app">
                            <div class="col-md-12 mb-12 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                                <div class="rounded border jobs-wrap">

                                    @foreach($companies as $comp)
                                        <a href="{{route('company.index',[$comp->id,$comp->slug])}}"
                                           class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                                            <div class="company-logo blank-logo text-center text-md-left pl-3">
                                                <img src="{{$comp->logo== '' ? asset('images/uploads/logo.jpg') :asset
                                ('images/uploads/'.$comp->logo)}}" alt="Image" class="img-fluid mx-auto">
                                            </div>
                                            <div class="job-details h-100">
                                                <div class="p-3 align-self-center">
                                                    <h3>{{$comp->cname}}</h3>
                                                    <div class="d-block d-lg-flex">
                                                        <div class="mr-3"><span class="icon-room mr-1"></span>
                                                            {{Str::limit($comp->address,20)}}
                                                        </div>
                                                        <div class="mr-3"><span class="icon-phone-square
                                                        mr-1"></span>{{Str::limit($comp->phone,13)}}
                                                        </div>
                                                        <div class="mr-3">
                                                            <span class="icon-envelope-open-o mr-1"></span>{{Str::limit
                                                            ($comp->email,10)}}
                                                        </div>
                                                        <div class="mr-3">
                                                            <span class="icon-globe mr-1"></span>{{$comp->website}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach

                                </div>
                                <span style="display: flex;justify-content: center;" class="mt-3">
                                    {{$companies->links()}}
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
