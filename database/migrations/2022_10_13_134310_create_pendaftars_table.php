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
		//data tidak akan ditambah jika email yang sama sudah terdaftar dan aktif
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
			$table->string('nama');
            $table->string('email')->unique();
            $table->string('hp');
			$table->foreignId('prodi_id')->nullable()->constrained()->nullOnDelete();
			$table->boolean('aktif')->default(0);
			$table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
			$table->string('no_ktp', 16)->unique();
			$table->string('asal_sekolah');
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
        Schema::dropIfExists('pendaftars');
    }
};
