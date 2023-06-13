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
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
			$table->string('nama_prodi');
			$table->longText('deskripsi_prodi')->nullable();
			$table->string('thumbnail')->nullable();
			$table->string('logo_prodi')->nullable();
			$table->string('visi_misi')->nullable();
            $table->longText('visi_misi_text')->nullable();
			$table->string('struktur')->nullable();
			$table->string('slug')->unique();
			$table->string('subdomain')->unique()->nullable();
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
        Schema::dropIfExists('prodis');
    }
};
