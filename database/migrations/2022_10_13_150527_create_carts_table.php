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
		// cart dihapus jika telah melakukan transaksi dan tidak terpengaruh oleh hasil transaksi
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
			$table->foreignId('katalog_id')->constrained()->cascadeOnDelete();
			$table->foreignId('user_id')->constrained()->cascadeOnDelete();
			$table->integer('jumlah')->unsigned()->default(1);
			$table->float('subtotal', 8, 2);
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
        Schema::dropIfExists('carts');
    }
};
