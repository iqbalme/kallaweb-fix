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
        // Schema::create('menus', function (Blueprint $table) {
            // $table->id();
			// $table->integer('parent')->unsigned()->default(0);
			// $table->string('menu');
			// $table->string('link')->nullable()->default('#');
			// $table->integer('urutan')->unsigned()->default(0); //urutan
            // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
