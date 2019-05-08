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
        <form action="admin/loaisp/add_loaisp" method="post" enctype="multipart/form-data">
            @csrf
            <h3 ><b>Thêm Loại SP</b></h3>
            <div class="form-group">
                <label>Tên Loại</label>
                <input type="text" name="TenLoai" placeholder="Tên loại SP" class="form-control" value="" />
            </div>

            <div class="form-group">
                <div class="submit">
                    <input type="submit" class="btn btn-primary" name="btnsubmit" value="Thêm loại" />
                </div>
            </div>
        </form>
    </div>
@endsection