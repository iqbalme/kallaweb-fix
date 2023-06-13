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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
			$table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
			$table->foreignId('katalog_id')->nullable()->constrained()->nullOnDelete();
			$table->float('harga', 13, 2); //untuk capture harga saat itu mengantisipasi terjadi perubahan harga di kemudian hari
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
        Schema::dropIfExists('invoice_items');
    }
};
