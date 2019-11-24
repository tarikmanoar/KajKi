@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mb-4">
            @if(auth()->user()->role=='seeker')

                <div class="col-md-2">
                    @if(!empty(auth()->user()->profile->avatar))
                        <img src="{{asset('images/uploads/'.auth()->user()->profile->avatar)
                        }}" alt="Srorry" class="img-fluid">
                    @else
                        <img src="{{asset('avatar/man.jpg')}}" alt="Srorry" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <form action="{{route('user.avatar')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <label for="file" class="btn btn-info btn-sm">Change Image</label>
                            <input id="file" type="file" class="form-control" name="avatar" style="display: none"><br>
                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Update Your Profile</div>
                        <div class="card-body">
                            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-{{session('type')}}">
                                        {{session('message')}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input class="form-control" type="number" id="phone_number" name="phone_number"
                                           value="{{auth()->user()->profile->phone_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="cover_letter">Cover Letter</label>
                                    <textarea name="cover_latter" id="cover_letter"
                                              class="form-control">{{auth()->user()->profile->cover_latter}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <textarea name="experience" id="experience"
                                              class="form-control">{{auth()->user()->profile->experience}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea name="bio" id="bio"
                                              class="form-control">{{auth()->user()->profile->bio}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-header">Your Information</div>
                    <div class="card-body">
                        <p>Name: {{auth()->user()->name}}</p>
                        <p>Email: {{auth()->user()->email}}</p>
                        <p>Address: {{auth()->user()->profile->address}}</p>
                        <p>Gender: {{auth()->user()->profile->gender}}</p>
                        <p>Experience: {{auth()->user()->profile->experience}}</p>
                        <p>Bio: {{auth()->user()->profile->bio}}</p>
                        <p>Created At: {{date('F d Y',strtotime(auth()->user()->created_at))}}</p>

                        @if(!empty(auth()->user()->profile->resume))
                            <p><a class="btn btn-info btn-sm" href="{{asset('images/files/'.auth()->user()->profile->resume)
                        }}">Resume</a></p>
                        @else
                            <p class="text-danger">Upload Your Resume</p>
                        @endif
                    </div>
                    <div class="card card-header">Upload Resume</div>
                    <div class="card-body">
                        <form action="{{route('user.cover')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <label for="file" class="text-danger">Upload only pdf,doc,docx</label>
                            <input id="file" type="file" class="form-control" name="resume"><br>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                </div>
            @else

                <div class="col-md-12 mb-3">
                    @if(!empty(auth()->user()->company->cover_photo))
                        <img src="{{asset('images/uploads/'.auth()->user()->company->cover_photo)}}" alt="Sorry"
                             class="img-fluid" style="height: 376px;width: 100%;">
                    @else
                        <img src="{{asset('images/uploads/cv1.jpg')}}" alt="Sorry" class="img-fluid" style="height: 376px;
                        width: 100%;">
                    @endif
                </div>

                {{--*******************
                || Company Profile
                ||******************--}}

                <div class="col-md-2">
                    @if(!empty(auth()->user()->company->logo))
                        <img src="{{asset('images/uploads/'.auth()->user()->company->logo)
                        }}" alt="Sorry" class="img-fluid">
                    @else
                        <img src="{{asset('avatar/man.jpg')}}" alt="Sorry" class="img-fluid">
                    @endif
                    <div class="card-body">
                        <form action="{{route('company.logo')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <label for="file" class="btn btn-info btn-sm">Change Logo</label>
                            <input id="file" type="file" class="form-control" name="logo" style="display: none"><br>
                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Update Your Company Profile</div>
                        <div class="card-body">
                            <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(session()->has('message'))
                                    <div class="alert alert-{{session('type')}}">
                                        {{session('message')}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                           id="phone" name="phone"
                                           value="{{auth()->user()->company->phone}}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="website">Web Site</label>
                                    <input class="form-control @error('website') is-invalid @enderror" type="text"
                                           id="website" name="website"
                                           value="{{auth()->user()->company->website}}">
                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slogan">Slogan</label>
                                    <input class="form-control @error('slogan') is-invalid @enderror" type="text"
                                           id="slogan" name="slogan"
                                           value="{{auth()->user()->company->slogan}}">
                                    @error('slogan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description" id="description"
                                              style="height: 140px;resize: none;">{{auth()->user()->company->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cover_photo">Cover Photo</label>
                                    <input class="form-control @error('cover_photo') is-invalid @enderror" type="file"
                                           id="cover_photo" name="cover_photo">
                                    @error('cover_photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Company Information</div>
                        <div class="card-body">
                            <p><strong>Company Name</strong>: {{auth()->user()->company->cname}}</p>
                            <p><strong>Company Phone</strong>: {{auth()->user()->company->phone}}</p>
                            <p><strong>Company Email</strong>: {{auth()->user()->company->email}}</p>
                            <strong>Company Website</strong>:<a href="{{auth()->user()->company->website}}">
                                {{auth()->user()->company->website}}
                            </a>
                            <p><strong>Company Address</strong>: {{auth()->user()->company->address}}</p>
                            <p><strong>Company Slogan</strong>: {{auth()->user()->company->slogan}}</p>
                            <p><strong>Company Description</strong>: {{auth()->user()->company->description}}</p>
                            <p><strong>Company Created At</strong>: {{date('F d Y',strtotime(auth()->user()
                            ->company->created_at))}}</p>
                            <a href="{{route('company.index',[auth()->user()->company->id,auth()->user()->company->slug])}}"
                               class="btn btn-dark btn-sm">View Company Page</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
