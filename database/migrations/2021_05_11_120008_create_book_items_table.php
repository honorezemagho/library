<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_items', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->double("price");
            $table->date("date_of_purchase");
            $table->date("publish_date");
            $table->date("publish_country");
            $table->text("url");
            $table->foreignId("book_format")->references("id")->on("book_formats");
            $table->foreignId("status_id")->references("id")->on("status");
            $table->foreignId("book_id")->references("id")->on("books");
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
        Schema::dropIfExists('book_items');
    }
}
