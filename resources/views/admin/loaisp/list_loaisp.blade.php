@extends('admin.layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Loại SP</h3>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                @endif
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Tên Loại</th>
                                <th>Created_at</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loaisp as $loai)
                                <tr>
                                    <td>{{$loai->TenLoai}}</td>
                                    <td>{{$loai->created_at}}</td>
                                    <td><a href="admin/loaisp/edit_loaisp/{{$loai->id}}">Edit</a></td>
                                    <td><a onclick="return confirm('Bạn có muốn xóa?')" href="admin/loaisp/delete_loaisp/{{$loai->id}}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>

                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection