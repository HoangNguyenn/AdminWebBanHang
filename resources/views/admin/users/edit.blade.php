@extends('admin.layout.index')
@section('content')
    <div class="container">
        @if(count($errors) >0)
            @foreach($errors->all() as $er)
                <div class="alert alert-danger">
                    {{$er}}
                </div>
            @endforeach
        @endif
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="edit/{{$user->id}}">
            @csrf
            <h3 ><b>Edit user {{$user->name}}</b></h3>
            <div class="form-group">
                <label>name</label>
                <input type="text" name="name" placeholder="name" class="form-control" value="{{$user->name}}" />
            </div>
            <div class="form-group">
                <label>username</label>
                <input type="text" name="username" placeholder="name" class="form-control" value="{{$user->username}}" />
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" placeholder="email" class="form-control" value="{{$user->email}}" disabled />
            </div>

            <div class="form-group">
                <label>Hình ảnh</label>
                <img style="width: 150px" src="upload/{{$user->image}}" alt="">
                <p></p>
                <input type="file" name="Picture">
            </div>
            @if($user->role==0)
                <input disabled type="radio" name="quyen" checked="" value="0">Người dùng
            @else
                <input  type="radio" name="quyen"  value="0">Người dùng
                <input  type="radio" name="quyen" checked="" value="1">Admin
            @endif
            <div class="form-group">
                <div class="submit">
                    <input type="submit" class="btn btn-primary" name="btnsubmit" value="Save" />
                </div>
            </div>
        </form>
    </div>
@endsection