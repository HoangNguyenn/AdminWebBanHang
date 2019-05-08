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
        <form  method="post" enctype="multipart/form-data">
            @csrf
            <h3 ><b>Edit Loại SP</b></h3>
            <div class="form-group">
                <label>Tên Loại</label>
                <input type="text" name="TenLoai" placeholder="Tên loại SP" class="form-control" value="{{$loaisp->TenLoai}}" />
            </div>

            <div class="form-group">
                <div class="submit">
                    <input type="submit" class="btn btn-primary" name="btnsubmit" value="Save" />
                </div>
            </div>
        </form>
    </div>
@endsection