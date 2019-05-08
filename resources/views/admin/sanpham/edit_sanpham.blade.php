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
        <form class="form-horizontal"  method="post" enctype="multipart/form-data">
            @csrf
            <h3 ><b>Edit  sản phảm</b></h3>
            <div  class="card-header">
                <h3 style="text-align: center"  class="card-title">Thông tin cơ bản</h3>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Tên Sản phẩm:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input required=""  type="text" name="TenSP" placeholder="Tên sản phẩm" class="form-control"
                               value="{{$sanpham->TenDT}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Chọn hãng:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="LoaiSP" id="">
                            @foreach($loaisp as $key=> $loai)
                                <option
                                        @if($sanpham->id_LoaiSP==$loai->id)
                                        {{'selected="selected"'}}
                                        @endif
                                        value="{{$loai->id}}">{{$loai->TenLoai}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Mô tả sản phẩm:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <textarea required=""  id="demo" class="ckeditor" rows="3" name="MoTaSP">
                            {!!$sanpham->MoTaSP  !!}
                        </textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Mô tả chi tiết sản phẩm:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <textarea required="" id="demo" class="ckeditor" rows="3" name="MoTaChiTiet">
                            {!! $sanpham->MoTaChiTiet !!}
                        </textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Số lượng:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="number" name="SoLuong" placeholder="Số lượng"
                               class="form-control" value="{{$sanpham->SoLuong}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Giá:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="number" name="DonGia" placeholder="Giá"
                               class="form-control" value="{{$sanpham->DonGia}}" />
                    </div>
                </div>

            </div>

            <div  class="card-header">
                <h3 style="text-align: center"  class="card-title">Màn hình</h3>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Màn hình rộng:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input required="" type="text" name="ManHinh" placeholder="Màn hình rộng"
                               class="form-control" value="{{$sanpham->ManHinh}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Độ phân giải:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="DoPhanGiai" placeholder="Độ phân giải"
                               class="form-control" value="{{$sanpham->DoPhanGiai}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Công nghệ màn hình:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="CongNgheManHinh" placeholder="Công nghệ màn hình"
                               class="form-control" value="{{$sanpham->CongNgheManHinh}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Mặt kính cảm ứng:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="MatKinhCamUng" placeholder="Mặt kính cảm ứng"
                               class="form-control" value="{{$sanpham->MatKinhCamUng}}" />
                    </div>
                </div>
            </div>

            <div  class="card-header">
                <h3 style="text-align: center"  class="card-title">Camera</h3>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Độ phân giải camera trước:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input required="" type="text" name="CaMeRaTruoc" placeholder="Độ phân giải camera trước"
                               class="form-control" value="{{$sanpham->CaMeRaTruoc}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Độ phân giải camera sau:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="CaMeRaSau" placeholder="Độ phân giải camera sau"
                               class="form-control" value="{{$sanpham->CaMeRaSau}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Chụp ảnh nâng cao:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="ChupAnhNangCao" placeholder="Chụp ảnh nâng cao"
                               class="form-control" value="{{$sanpham->ChupAnhNangCao}}" />
                    </div>
                </div>

            </div>

            <div  class="card-header">
                <h3 style="text-align: center"  class="card-title">Hệ điều hành - CPU</h3>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Hệ điều hành:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input required="" type="text" name="HeDieuHanh" placeholder="Hệ điều hành"
                               class="form-control" value="{{$sanpham->HeDieuHanh}}" />
                    </div>
                </div>

            </div>

            <div  class="card-header">
                <h3 style="text-align: center"  class="card-title">Bộ nhớ và lưu trữ</h3>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Ram:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input required="" type="text" name="RAM" placeholder="Ram" class="form-control"
                               value="{{$sanpham->RAM}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Bộ nhớ trong:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="ROM" placeholder="Bộ nhớ trong"
                               class="form-control" value="{{$sanpham->ROM}}" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3" >
                        <label class="form-control-label">Bộ nhớ ngoài:</label>
                    </div>
                    <div  class="col-12 col-md-9">
                        <input required="" type="text" name="TheNho" placeholder="Bộ nhớ ngoài"
                               class="form-control" value="{{$sanpham->TheNho}}" />
                    </div>
                </div>

                <div  class="card-header">
                    <h3 style="text-align: center"  class="card-title">Kết nối</h3>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">WIFI:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input required="" type="text" name="Wifi" placeholder="WIFI"
                                   class="form-control" value="{{$sanpham->Wifi}}" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Bluetooth:</label>
                        </div>
                        <div  class="col-12 col-md-9">
                            <input required="" type="text" name="Bluetooth" placeholder="Bluetooth"
                                   class="form-control" value="{{$sanpham->Bluetooth}}" />
                        </div>
                    </div>

                </div>

                <div  class="card-header">
                    <h3 style="text-align: center"  class="card-title">Thiết kế và trọng lượng</h3>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Kích thước tổng thể:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input required="" type="text" name="KichThuoc" placeholder="Kích thước tổng thể"
                                   class="form-control" value="{{$sanpham->KichThuoc}}" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Trọng lượng:</label>
                        </div>
                        <div  class="col-12 col-md-9">
                            <input required="" type="text" name="TrongLuong" placeholder="Trọng lượng"
                                   class="form-control" value="{{$sanpham->TrongLuong}}" />
                        </div>
                    </div>

                </div>

                <div  class="card-header">
                    <h3 style="text-align: center"  class="card-title">Thông tin pin và sạc</h3>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Dung lượng pin:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input required="" type="text" name="Pin" placeholder="Dung lượng pin"
                                   class="form-control" value="{{$sanpham->Pin}}" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Loại pin:</label>
                        </div>
                        <div  class="col-12 col-md-9">
                            <input required="" type="text" name="LoaiPin" placeholder="Loại pin"
                                   class="form-control" value="{{$sanpham->LoaiPin}}" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Công nghệ pin:</label>
                        </div>
                        <div  class="col-12 col-md-9">
                            <input required="" type="text" name="CNPin" placeholder="Công nghệ pin "
                                   class="form-control" value="{{$sanpham->CNPin}}" />
                        </div>
                    </div>
                </div>

                <div  class="card-header">
                    <h3 style="text-align: center"  class="card-title">Thông tin khác</h3>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Màu điện thoại:</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input required="" type="text" name="MauDT" placeholder="Dung lượng pin"
                                   class="form-control" value="{{$sanpham->MauDT}}" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label">Bảo hành:</label>
                        </div>
                        <div  class="col-12 col-md-9">
                            <input required="" type="text" name="BaoHanh" placeholder="Bảo hành"
                                   class="form-control" value="{{$sanpham->BaoHanh}}" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3" >
                            <label class="form-control-label"> Hình sản phẩm :</label>
                        </div>
                        <img src="upload/{{$sanpham->Hinh}}" alt="">
                        <div  class="col-12 col-md-9">
                            <input  type="file" name="Hinh"  class="form-control" value="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="submit">
                        <input type="submit" class="btn btn-primary" name="btnsubmit" value="Save" />
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection