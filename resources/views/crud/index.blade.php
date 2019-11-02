@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('message'))
                    <div class="alert alert-{{session('type')}} text-center">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Contacts</div>

                    <div class="card-body">
                        <div class="add mb-3">
                            <a href="{{route('crud.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i></a>
                        </div>
                        <table class="table table-bordered table-info table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{route('crud.edit',$item->id)}}" class="btn btn-info"><i class="fa
                                        fa-edit"></i></a>
                                        <form action="{{route('crud.destroy',$item->id)}}" style="display: initial;" method="POST" onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <p>{{$data->links()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
