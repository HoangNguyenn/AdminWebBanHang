@extends('admin.layout.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Sản phẩm</h3>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                <!-- /.box-header -->
                    <?php $i=1 ?>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã SP</th>
                                <th>Tên SP</th>
                                <th>Giá</th>
                                <th>Hình</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sanpham as $sp)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$sp->id}}</td>
                                    <td>{{$sp->TenDT}}</td>
                                    <td>{{number_format($sp->DonGia,0)}}</td>
                                    <td><img style="width: 70px;" src="upload/{{$sp->Hinh}}" alt=""></td>
                                    <td><a href="admin/sanpham/edit_sanpham/{{$sp->id}}">Edit</a></td>
                                    <td><a onclick="return confirm('Bạn có muốn xóa?')" href="admin/sanpham/delete_sanpham/{{$sp->id}}">Delete</a></td>
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