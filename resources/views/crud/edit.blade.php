@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Contacts</div>

                    <div class="card-body">
                        <form action="{{route('crud.update',$data->id)}}" method="POST" accept-charset="utf-8"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                <label for="name" class="col-lg-3 form-control-label">Name</label>
                                <div class="col-lg-9">
                                     <input type="text" name="name" id="name" class="form-control"
                                            value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label for="address" class="col-lg-3 form-control-label">Address</label>
                                <div class="col-lg-9">
                                     <input type="text" name="address" id="address" class="form-control"
                                            value="{{$data->address}}">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label for="phone" class="col-lg-3 form-control-label">Phone</label>
                                <div class="col-lg-9">
                                     <input type="number" name="phone" id="phone" class="form-control"
                                            value="{{$data->phone}}">
                                </div>
                            </div>
                        	<div class="form-group row d-flex align-items-center mb-5">
                                <div class="col-lg-9 offset-3">
                                     <input type="submit" class="btn btn-success" class="form-control" value="Submit" >
                                    <a href="{{route('crud.index')}}" class="btn btn-info"><i class="fa
                                    fa-arrow-left"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
