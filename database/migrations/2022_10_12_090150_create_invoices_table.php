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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
			$table->string('no_invoice', 100);
			$table->float('total', 13, 2); //untuk capture total saat itu mengantisipasi terjadi perubahan harga di kemudian hari
			$table->boolean('use_voucher')->default(0);
			$table->string('xendit_invoice_id')->nullable();
			$table->string('channel_pembayaran')->nullable();
			$table->enum('status_payment', ['PENDING', 'PAID', 'EXPIRED'])->default('PENDING');
            $table->dateTimeTz('waktu_pembayaran')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
