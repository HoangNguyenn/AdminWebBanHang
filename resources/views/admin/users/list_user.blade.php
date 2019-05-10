@extends('admin.layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách User</h3>
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
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Picture</th>
                                <th>Role</th>
                                <th>Created_at</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $us)
                                <tr>
                                    <td>{{$us-> name}}</td>
                                    <td>{{$us-> username}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->image}}</td>
                                    <td>@if($us->role ==0) {{"Thường"}} @else {{"Admin"}}@endif</td>
                                    <td>{{$us->created_at}}</td>
                                    <td><a href="admin/user/edit_user/{{$us->id}}">Edit</a></td>
                                    <td><a onclick="return confirm('Bạn có muốn xóa?')" href="admin/user/delete_user/{{$us->id}}">Delete</a></td>
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