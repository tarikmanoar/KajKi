@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg">
                <div class="card">
                    <div class="card-header bg-info text-white"><h3>Post Job</h3></div>
                    <div class="card-body">
                        <form action="{{route('jobs.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-{{session('type')}}">
                                    {{session('message')}}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Job Title')}}
                                </label>
                                <div class="col-md col-lg">
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
                                <label for="description" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Job Description')}}
                                </label>
                                <div class="col-md col-lg">
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
                                <label for="position" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Position')}}
                                </label>
                                <div class="col-md col-lg">
                                    <input id="position" type="text" name="position"
                                           class="form-control @error('position') is-invalid @enderror"
                                           value="{{ old('position') }}" autocomplete="position">
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="roles" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Roles')}}
                                </label>
                                <div class="col-md col-lg">
                                    <input id="roles" type="text" name="roles"
                                           class="form-control @error('roles') is-invalid @enderror"
                                           value="{{ old('roles') }}" autocomplete="roles">

                                    @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_id" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Job Category')}}
                                </label>
                                <div class="col-md col-lg">
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
                                <label for="autocomplete" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Address')}}
                                </label>
                                <div class="col-md col-lg">
                                    <input type="text" class="form-control form-control-block search-input px-4
                                            @error('address') is-invalid @enderror"
                                           id="autocomplete" placeholder="city, province or region"
                                           onFocus="geolocate()" name="address" value="{{ old('address') }}"
                                           autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="number_of_vacancy" class="col-md-2 col-form-label text-md-right">
                                    {{ __('No Of Vacancy')}}
                                </label>
                                <div class="col-md col-lg">
                                    <input id="number_of_vacancy" type="number" name="number_of_vacancy"
                                           class="form-control @error('number_of_vacancy') is-invalid @enderror"
                                           value="{{ old('number_of_vacancy') }}" autocomplete="address">

                                    @error('number_of_vacancy')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="experience" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Experience')}}
                                </label>
                                <div class="col-md col-lg">
                                    <input id="experience" type="number" name="experience"
                                           class="form-control @error('experience') is-invalid @enderror"
                                           value="{{ old('experience') }}" autocomplete="address">

                                    @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Gender')}}
                                </label>
                                <div class="col-md col-lg">
                                    <select name="gender" id="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                        <option value="Any">Any</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="salary" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Salary')}}
                                </label>
                                <div class="col-md col-lg">
                                    <select name="salary" id="salary"
                                            class="form-control @error('salary') is-invalid @enderror">
                                        <option value="Negotiable">Negotiable</option>
                                        <option value="2000-5000">2000-5000</option>
                                        <option value="5000-1000">5000-1000</option>
                                        <option value="10000-15000">10000-15000</option>
                                        <option value="15000-25000">15000-25000</option>
                                        <option value="25000-50000">25000-50000</option>
                                        <option value="50000-100000">50000-100000</option>
                                    </select>

                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="job_type" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Job Type')}}
                                </label>
                                <div class="col-md col-lg">
                                    <select name="job_type" id="job_type"
                                            class="form-control @error('job_type') is-invalid @enderror">
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
                                <label for="status" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Job Status')}}
                                </label>
                                <div class="col-md col-lg">
                                    <select name="status" id="status"
                                            class="form-control @error('status') is-invalid @enderror">
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
                                <label for="datepicker" class="col-md-2 col-form-label text-md-right">
                                    {{ __('Dead Line')}}
                                </label>
                                <div class="col-md col-lg">
                                    <input id="datepicker" type="text" name="last_date"
                                           class="form-control @error('last_date') is-invalid @enderror"
                                           value="{{ old('last_date') }}" autocomplete="last_date">

                                    @error('last_date')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md col-lg offset-md-2">
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
