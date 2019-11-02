@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gallery</div>
                    <div class="card-body">
                        <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
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
                        	<div class="form-group row d-flex align-items-center mb-5">
                                <label for="album" class="col-lg-3 form-control-label">Album Name</label>
                                <div class="col-lg-9">
                                     <input type="text"  name="album" id="album" class="form-control" multiple>
                                </div>
                            </div>
                        	<div class="form-group row d-flex align-items-center mb-5">
                                <label for="image" class="col-lg-3 form-control-label">Image</label>
                                <div class="col-lg-9">
                                     <input type="file"  name="image[]" id="image" class="form-control" multiple>
                                </div>
                            </div>
                        	<div class="form-group row d-flex align-items-center mb-5">
                                <div class="col-lg-9 offset-3">
                                     <input type="submit" class="btn btn-success"class="form-control" value="Submit" >
                                    <a href="{{route('album.index')}}" class="btn btn-info"><i class="mr-2 fa
                                    fa-arrow-left"></i>Back To Home</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
