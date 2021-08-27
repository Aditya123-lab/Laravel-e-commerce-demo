<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addbooks', function (Blueprint $table) {
            $table->id();
            $table->string('book');
            $table->integer('quantity');
            $table->string('author');
            $table->integer('price');
            $table->string('photo');
            $table->string('intro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addbooks');
    }
}
