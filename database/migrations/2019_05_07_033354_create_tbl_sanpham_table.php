<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TenDT','60');
            $table->integer('id_LoaiSP');
            $table->string('MoTaSP','60');
            $table->string('MoTaChiTiet','60');
            $table->integer('SoLuong');
            $table->integer('DonGia');
            $table->string('ManHinh','60');
            $table->string('DoPhanGiai','60');
            $table->string('CongNgheManHinh','60');
            $table->string('MatKinhCamUng','60');
            $table->string('CaMeRaTruoc','60');
            $table->string('CaMeRaSau','60');
            $table->string('ChupAnhNangCao','60');
            $table->string('HeDieuHanh','60');
            $table->string('RAM','60');
            $table->string('ROM','60');
            $table->string('TheNho','60');
            $table->string('Wifi','60');
            $table->string('Bluetooth','60');
            $table->string('KichThuoc','60');
            $table->string('TrongLuong','60');
            $table->string('Pin','60');
            $table->string('LoaiPin','60');
            $table->string('CNPin','60');
            $table->string('MauDT','60');
            $table->string('BaoHanh','60');
            $table->string('Hinh','60');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sanpham');
    }
}
