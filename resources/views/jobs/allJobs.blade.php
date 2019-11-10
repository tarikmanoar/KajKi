@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">

                <h1>Recent Jobs ({{count($allJobs)}})</h1>
                <form action="{{route('jobs.allJobs')}}" method="GET" accept-charset="utf-8"
                      enctype="multipart/form-data">
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="keyword" class=" form-control-label">Keyword &nbsp;</label>
                            <input type="text" name="title" id="keyword" class="form-control @error('title')
                                is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>&nbsp;
                        <div class="form-group">
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
                        </div>&nbsp;
                        <div class="form-group">
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
                        </div>&nbsp;
                        <div class="form-group">
                            <label for="address" class=" form-control-label">Address &nbsp;</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>&nbsp;&nbsp;&nbsp;
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" class="form-control" value="Submit">
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-striped">
                    <tbody>
                    @foreach($allJobs as $job)
                        <tr>
                            <td>
                                @if(!empty($job->company->logo))
                                    <img src="{{asset('images/uploads/'.$job->company->logo)}}" alt="NO" width="80px">
                                @else
                                    <img src="{{asset('avatar/man.jpg')}}" alt="NO" width="80px">
                                @endif
                            </td>
                            <td>Position: {{$job->position}} <br>
                                <i class="fa fa-clock-o"></i>&nbsp; {{$job->job_type}}
                            </td>
                            <td width="300px"><i class="fa fa-map-marker"></i>&nbsp; Address: {{$job->address}}</td>
                            <td><i class="fa fa-globe"></i>&nbsp; Post:{{$job->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success
                            btn-sm">Apply</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$allJobs->appends(\Illuminate\Support\Facades\Input::except('page'))->links()}}
            </div>
        </div>
    </div>
@endsection
<style>
    .fa {
        color: #2ad;
    }
</style>
