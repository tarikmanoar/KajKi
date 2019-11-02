@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="row">
            <div class="col">
                <a href="{{route('album.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
            </div>
        </div>
        @endif
        <div class="row">
            @foreach($albums as $album)
            <div class="col-sm-4">
                <div class="images">
                        <img src="{{asset('images/uploads/'.$album->image->name)}}" alt="SORRY!" class="img-fluid"
                             width="300px">
                        <a href="album/{{$album->id}}" class="album">{{$album->name}}</a>
                </div>
            </div>
            @endforeach
            <span>{{$albums->links()}}</span>
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
        transform: translate(-50%,-50%);
        color: #fff;
        font-size: 24px;
    }
</style>
