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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
			$table->string('nama_event');
			$table->longText('deskripsi_event');
			$table->dateTime('waktu_mulai');
			$table->dateTime('waktu_berakhir');
			$table->string('gambar_event');
			$table->string('lokasi')->nullable();
			$table->foreignId('voucher_id')->nullable()->constrained()->nullOnDelete();
			$table->string('link_daftar')->nullable();
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
        Schema::dropIfExists('events');
    }
};
