<?php

namespace App\Http\Controllers;

use App\LoaiSP;
use App\SanPham;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {
        $loaisp=LoaiSP::all();
        $sanpham=SanPham::all();
        view::share(compact('loaisp','sanpham'));

    }
    public function getForgot()
    {
        return view('admin/login/forgot');
    }
    public function getList()
    {
        $user=User::paginate(10);
        return view('admin/users/list_user',compact('user'));
    }
    public function getAddUser()
    {
        return view('admin/users/add_user');
    }
    public function  postAddUser(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'password'=>'required',
                'confirm'=>'required|same:password',
                'image'=>'required',
            ],
            [
                'name.required'=>'Mời bạn nhập Name',
                'email.required'=>'Mời bạn nhập Name',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Mời bạn nhập Password',
                'confirm.required'=>'Mời bạn nhập lại Password',
                'confirm.same'=>'Mật khẩu không giống nhau',
                'image.required'=>'Mời bạn chọn hình cho User',
            ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $fileName=time().'_'.$file->getClientOriginalName();
            while(file_exists('upload/'.$fileName))
            {
                $fileName=time().'_'.$file->getClientOriginalName();
            }
            $destinationPath = public_path('upload/');
            $file->move($destinationPath,$fileName);
            $user->image=$fileName;
        }
        $user->role=$request->quyen;
        $user->save();
        return redirect('admin/user/add_user')->with('thongbao','Thêm User thành công');
    }
    public function getEditUser($id)
    {
        $user=User::find($id);
        return view('admin/users/edit_user',compact('user'));
    }
    public function postEditUser(Request $request,$id)
    {
        $user=User::find($id);
        $this->validate($request,
            [
                'name'=>'required',
                'password'=>'required',
                'confirm'=>'required|same:password',
                'image'=>'required',
            ],
            [
                'name.required'=>'Mời bạn nhập Name',
                'password.required'=>'Mời bạn nhập Password',
                'confirm.required'=>'Mời bạn nhập Confirm Password',
                'confirm.same'=>'Mật khẩu không giống nhau',
                'image.required'=>'Mời bạn chọn hình cho User',
            ]);
        $user->name=$request->name;
        $user->password=bcrypt($request->password);
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $fileName=time().'_'.$file->getClientOriginalName();
            while(file_exists('upload/'.$fileName))
            {
                $fileName=time().'_'.$file->getClientOriginalName();
            }
            $destinationPath = public_path('upload/');
            $file->move($destinationPath,$fileName);
            $user->image=$fileName;
        }
        $user->role=$request->quyen;
        $user->save();
        $user->role=$request->quyen;
        $user->save();
        return redirect('admin/user/edit_user/'.$id)->with('thongbao','Sửa user thành công');

    }
    public function DeleteUser($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/list_user')->with('thongbao','Xóa user thành công');
    }
    public function getLogin()
    {
        return view('admin/login/login');
    }
    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->pass]))
        {
            return view('home');
        }
        else
        {
            return redirect('dangnhap')->with('thongbao','Sai tài khoản hoặc mật khẩu');
        }
    }
    public function getregister()
    {
        return view('admin/login/register');
    }
    public function postregister(Request $request)
    {
        $this->validate($request,
            [
                'email'=>'unique:users,email',
                'confirm'=>'same:password',
            ],
            [
                'email.unique'=>'Email đã tồn tại',
                'confirm.same'=>'Password không giống nhau',
            ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=0;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('login');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('dangnhap');
    }
    public function getProfile($id)
    {
        $user=User::find($id);
        return view('admin/users/profile',compact('user'));
    }
    public function getEdit($id)
    {
        $user=User::find($id);
        return view('admin/users/edit',compact('user'));
    }
    public function postEdit(Request $request,$id)
    {
        $user=User::find($id);
        $this->validate($request,
            [
                'name'=>'required',

            ],
            [
                'name.required'=>'Mời bạn nhập Name',

            ]);
        $user->name=$request->name;
        if($request->hasFile('Picture'))
        {
            $file=$request->file('Picture');
            $fileName=time().'_'.$file->getClientOriginalName();
            while(file_exists('upload/'.$fileName))
            {
                $fileName=time().'_'.$file->getClientOriginalName();
            }
            $destinationPath = public_path('upload/');
            $file->move('upload/',$fileName);

                $user->image=$fileName;
        }
        $user->save();
        return redirect('edit/'.$id)->with('thongbao','Sửa user thành công');
    }
}
