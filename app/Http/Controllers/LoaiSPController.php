<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\LoaiSP;
class LoaiSPController extends Controller
{
    public function getList()
    {
        $loaisp=LoaiSP::paginate(10);
        return view('admin/loaisp/list_loaisp',compact('loaisp'));
    }
    public function getAddLoaiSP()
    {
        return view('admin/loaisp/add_loaisp');
    }
    public function postAddLoaiSP(Request $request)
    {
        $this->validate($request,
            [
                'TenLoai'=>'required',

            ],
            [
                'TenLoai.required'=>'Mời bạn nhập Tên Loại SP',

            ]);
        $loaisp=new LoaiSP();
        $loaisp->TenLoai=$request->TenLoai;
        $loaisp->save();
        return redirect('admin/loaisp/add_loaisp')->with('thongbao','Thêm user thành công');
    }
    public  function getEditLoaiSP($id)
    {
        $loaisp=LoaiSP::find($id);
        return view('admin/loaisp/edit_loaisp',compact('loaisp'));
    }
    public function postEditLoaiSP(Request $request,$id)
    {
        $loaisp=LoaiSP::find($id);
        $this->validate($request,
            [
                'TenLoai'=>'required',

            ],
            [
                'TenLoai.required'=>'Mời bạn nhập Tên Loại SP',

            ]);
        $loaisp->TenLoai=$request->TenLoai;
        $loaisp->save();
        return redirect('admin/loaisp/edit_loaisp/'.$id)->with('thongbao','Edit Loại SP thành công');
    }
    public function DeleteLoaiSP($id)
    {
        $loaisp=LoaiSP::find($id);
        $loaisp->delete();
        return redirect('admin/loaisp/list_loaisp')->with('thongbao','Delete Loại SP thành công');
    }
}

