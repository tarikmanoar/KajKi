@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($applicants->count() > 0)
                <div class="card">
                    @foreach($applicants as $applicant)
                        <div class="card-header">
                            <h3>
                                <a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}">{{$applicant->title}}</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Address</td>
                                    <td>Gender</td>
                                    <td>BIO</td>
                                    <td>Experience</td>
                                    <td>Cover Letter</td>
                                    <td>Resume</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applicant->users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->profile->address}}</td>
                                        <td>{{$user->profile->gender}}</td>
                                        <td>{{$user->profile->bio}}</td>
                                        <td>{{$user->profile->exprience}}</td>
                                        <td>{{$user->profile->cover_latter}}</td>
                                        <td>
                                            @if(!empty($user->profile->resume))
                                                <a href="{{asset('images/files/'.$user->profile->resume)}}">Resume</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
                @else
                <h1 class="text-uppercase text-center display-2 text-danger bg-info">NO Applicants!</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
