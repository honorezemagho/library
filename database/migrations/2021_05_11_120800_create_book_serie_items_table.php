<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookSerieItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_serie_items', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("url");
            $table->foreignId("book_serie_id")->references("id")->on("book_series");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_serie_items');
    }
}
