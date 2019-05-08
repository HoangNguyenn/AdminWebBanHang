<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\LoaiSP;
class SanPhamController extends Controller
{
    public  function getList()
    {
        $sanpham=SanPham::paginate(10);
        return view('admin/sanpham/list_sanpham',compact('sanpham'));
    }
    public  function getAddSanPham()
    {
        $loaisp=LoaiSP::all();
        return view('admin/sanpham/add_sanpham',compact('loaisp'));
    }
    public function postAddSanPham(Request $request)
    {
        $this->validate($request,
            [
                'LoaiSP'=>'required',
                'Hinh'=>'required',

            ],
            [
                'LoaiSP.required'=>'Mời bạn chọn Loại SP',
                'Hinh.required'=>'Mời bạn chọn hình sản phẩm',

            ]);
        $sanpham=new SanPham();
        $sanpham->TenDT=$request->TenSP;
        $sanpham->id_LoaiSP=$request->LoaiSP;
        $sanpham->MoTaSP=$request->MoTaSP;
        $sanpham->MoTaChiTiet=$request->MoTaChiTiet;
        $sanpham->SoLuong=$request->SoLuong;
        $sanpham->DonGia=$request->DonGia;
        $sanpham->ManHinh=$request->ManHinh;
        $sanpham->DoPhanGiai=$request->DoPhanGiai;
        $sanpham->CongNgheManHinh=$request->CongNgheManHinh;
        $sanpham->MatKinhCamUng=$request->MatKinhCamUng;
        $sanpham->CaMeRaTruoc=$request->CaMeRaTruoc;
        $sanpham->CaMeRaSau=$request->CaMeRaSau;
        $sanpham->ChupAnhNangCao=$request->ChupAnhNangCao;
        $sanpham->HeDieuHanh=$request->HeDieuHanh;
        $sanpham->RAM=$request->RAM;
        $sanpham->ROM=$request->ROM;
        $sanpham->TheNho=$request->TheNho;
        $sanpham->Wifi=$request->Wifi;
        $sanpham->Bluetooth=$request->Bluetooth;
        $sanpham->KichThuoc=$request->KichThuoc;
        $sanpham->TrongLuong=$request->TrongLuong;
        $sanpham->Pin=$request->Pin;
        $sanpham->LoaiPin=$request->LoaiPin;
        $sanpham->CNPin=$request->CNPin;
        $sanpham->MauDT=$request->MauDT;
        $sanpham->BaoHanh=$request->BaoHanh;
        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $fileName=time().'_'.$file->getClientOriginalName();
            while(file_exists('upload/'.$fileName))
            {
                $fileName=time().'_'.$file->getClientOriginalName();
            }
            $destinationPath = public_path('upload/');
            $file->move($destinationPath,$fileName);
            $sanpham->Hinh=$fileName;
        }
        $sanpham->save();
        return redirect('admin/sanpham/add_sanpham')->with('thongbao','Thêm sản phẩm thành công');

    }
    public function getEditSanPham($id)
    {
        $sanpham=SanPham::find($id);
        $loaisp=LoaiSP::all();
        return view('admin/sanpham/edit_sanpham',compact('sanpham','loaisp'));
    }
    public function postEditSanPham(Request $request,$id)
    {
        $sanpham=SanPham::find($id);
        $this->validate($request,
            [
                'LoaiSP'=>'required',

                'TenDT'=>'unique:tbldienthoai,TenDT',
            ],
            [
                'LoaiSP.required'=>'Mời bạn chọn Loại SP',

                'Hinh.unique'=>'Tên Điện thoại đã tồn tại',
            ]);
        $sanpham->TenDT=$request->TenSP;
        $sanpham->id_LoaiSP=$request->LoaiSP;
        $sanpham->MoTaSP=$request->MoTaSP;
        $sanpham->MoTaChiTiet=$request->MoTaChiTiet;
        $sanpham->SoLuong=$request->SoLuong;
        $sanpham->DonGia=$request->DonGia;
        $sanpham->ManHinh=$request->ManHinh;
        $sanpham->DoPhanGiai=$request->DoPhanGiai;
        $sanpham->CongNgheManHinh=$request->CongNgheManHinh;
        $sanpham->MatKinhCamUng=$request->MatKinhCamUng;
        $sanpham->CaMeRaTruoc=$request->CaMeRaTruoc;
        $sanpham->CaMeRaSau=$request->CaMeRaSau;
        $sanpham->ChupAnhNangCao=$request->ChupAnhNangCao;
        $sanpham->HeDieuHanh=$request->HeDieuHanh;
        $sanpham->RAM=$request->RAM;
        $sanpham->ROM=$request->ROM;
        $sanpham->TheNho=$request->TheNho;
        $sanpham->Wifi=$request->Wifi;
        $sanpham->Bluetooth=$request->Bluetooth;
        $sanpham->KichThuoc=$request->KichThuoc;
        $sanpham->TrongLuong=$request->TrongLuong;
        $sanpham->Pin=$request->Pin;
        $sanpham->LoaiPin=$request->LoaiPin;
        $sanpham->CNPin=$request->CNPin;
        $sanpham->MauDT=$request->MauDT;
        $sanpham->BaoHanh=$request->BaoHanh;
        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $fileName=time().'_'.$file->getClientOriginalName();
            while(file_exists('upload/',$fileName))
            {
                $fileName=time().'_'.$file->getClientOriginalName();
            }
            $destinationPath = public_path('u   pload/');
            $file->move($destinationPath,$fileName);
            unlink('upload/'.$sanpham->Hinh);
            $sanpham->Hinh=$fileName;
        }
        $sanpham->save();
        return redirect('admin/sanpham/edit_sanpham/'.$id)->with('thongbao','Edit sản phẩm thành công');
    }

    public function DeleteSanPham($id)
    {
        $sanpham=SanPham::find($id);
        $sanpham->delete();
        return redirect('admin/sanpham/list_sanpham')->with('thongbao','Xóa sản phẩm thành công');
    }

}
