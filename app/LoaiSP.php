<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    protected $table="tbl_loaisp";
    public function sanpham()
    {
        return $this->hasMany('App/SanPham', 'id_LoaiSP', 'id');
    }

}