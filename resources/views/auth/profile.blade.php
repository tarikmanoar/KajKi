@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @if(!empty(auth()->user()->profile->avatar))
                    <img src="{{asset('images/uploads/'.auth()->user()->profile->avatar)
                        }}" alt="Srorry" class="img-fluid">
                @else
                    <img src="{{asset('avatar/man.jpg')}}" alt="Srorry" class="img-fluid">
                @endif
                <div class="card-body">
                    <form action="{{route('user.cover')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <label for="file" class="btn btn-info btn-sm">Change Image</label>
                        <input id="file" type="file" class="form-control" name="resume" style="display: none"><br>
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
        </div>
    </div>
@endsection
