@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-{{session('type')}}">
                {{session('message')}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-2">
                <a href="{{route('album.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-left
                mr-2"></i> Go Back</a>

                @if (Auth::check() && Auth::user()->role == 'admin')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal"data-target="#addImage{{$album->id}}">
                    <i class="fa fa-plus"></i>
                </button>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="addImage{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('album.image')}}" method="POST" enctype="multipart/form-data">
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
                                    <input type="hidden" name="albumId" value="{{$album->id}}">
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
            <div class="col-sm-3">
                <div class="bg-info ml-3 p-2 text-uppercase text-light text-center">
                    {{$album->name}} {= <b>{{$images->count()}}</b> =}</div>
            </div>
        </div>
        <div class="row">
            @foreach($images as $image)
                <div class="col-sm-4">
                    <div class="images">
                        <img src="{{asset('images/uploads/'.$image->name)}}" alt="SORRY!" class="img-fluid"
                             width="300px">
                    </div>
{{--                    <div class="album">--}}
{{--                        <a href="{{asset('images/uploads/'.$image->name)}}" target="_blank" class="btn btn-warning"><i class="fa--}}
{{--                    fa-eye"></i></a>--}}
{{--                        <form action="{{route('album.destroy',$image->id)}}" style="display: initial;" method="POST"--}}
{{--                              onsubmit="return confirm('Are You Sure?')">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">--}}
{{--                                <i class="fa fa-trash"></i>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <a href="{{asset('images/uploads/'.$image->name)}}" target="_blank" class="btn btn-primary"><i class="fa
                    fa-eye"></i></a>
                    <!-- Button trigger modal -->
                    @if (Auth::check() && Auth::user()->role == 'admin')
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal{{$image->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are sure to Delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                    <form action="{{route('album.destroy',$image->id)}}" style="display: initial;margin-bottom: 0;" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .images{
        left: 0;
        top: 0;
        position: relative;
        overflow: hidden;
        margin-top: 50px;
    }
    .images img{
        -webkit-transition: 0.6s ease;
        transition: 0.6s ease;
    }
    .images img:hover{
        -webkit-transform:scale(1.2);
        transform: scale(1.2);
    }
    .album{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-211%,289%);
        color: #fff;
        font-size: 24px;
    }
    .album:hover{
        display: block;
        transition: 1s;
    }
</style>
