@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Post A Job</h3></div>
                    <div class="card-body">
                        <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-{{session('type')}}">
                                    {{session('message')}}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Job Title')}}
                                </label>
                                <div class="col-md-6">
                                    <input id="title" type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}" autocomplete="title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Job Description')}}
                                </label>
                                <div class="col-md-6">
                            <textarea name="description" id="description" class="form-control @error('description')
                                is-invalid @enderror" style="height: 140px;resize: none">{{old('description')
                                }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Position')}}
                                </label>
                                <div class="col-md-6">
                                    <input id="position" type="text" name="position"
                                           class="form-control @error('position') is-invalid @enderror"
                                           value="{{ old('position') }}"  autocomplete="position">
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="roles" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Roles')}}
                                </label>
                                <div class="col-md-6">
                                    <input id="roles" type="text" name="roles"
                                           class="form-control @error('roles') is-invalid @enderror"
                                           value="{{ old('roles') }}"  autocomplete="roles">

                                    @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Job Category')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="category_id" id="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                        <option></option>
                                        @foreach(\App\Models\Category::all() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Address')}}
                                </label>
                                <div class="col-md-6">
                                    <input id="address" type="text" name="address"
                                           class="form-control @error('address') is-invalid @enderror"
                                           value="{{ old('address') }}"  autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="job_type" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Job Type')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="job_type" id="job_type" class="form-control @error('job_type') is-invalid
@enderror">
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
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Job Status')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-control @error('status') is-invalid
@enderror">
                                        <option value="1">Live</option>
                                        <option value="0">Draft</option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_date" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Dead Line')}}
                                </label>
                                <div class="col-md-6">
                                    <input id="last_date" type="date" name="last_date"
                                           class="form-control @error('last_date') is-invalid @enderror"
                                           value="{{ old('last_date') }}"  autocomplete="last_date">

                                    @error('last_date')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Post Job') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
