<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table="tbl_sanpham";
    public function loaisp()
    {
        return $this->belongsTo('App\LoaiSP','id_loaisp','id');
    }
}