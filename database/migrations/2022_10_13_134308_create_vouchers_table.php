<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
			$table->string('nama_voucher');
			$table->longText('deskripsi_voucher')->nullable();
			$table->string('kode_voucher', 10)->unique();
			//$table->foreignId('katalog_id')->nullable()->constrained(); //berlaku hanya untuk katalog ini, jika null maka berlaku untuk semua
			//$table->string('katalog_id')->nullable()->default('0');
			$table->enum('tipe_diskon', ['persen', 'nominal'])->default('persen');
			$table->integer('nominal_diskon')->unsigned();
			$table->date('awal_berlaku')->nullable()->default(null);
			$table->date('akhir_berlaku')->nullable()->default(null); //jika awal dan akhir kosong maka berlaku untuk selamanya
			//$table->longText('pengguna_diizinkan')->nullable(); //daftar pendaftar yang diizinkan, berisi id user dan dipisahkan dengan koma, contoh: 1,2,5,9,17, jika null maka berlaku untuk semua pendaftar
			$table->boolean('aktif')->default(0);
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
        Schema::dropIfExists('vouchers');
    }
};
