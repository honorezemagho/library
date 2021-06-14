<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("ISBN")->nullable();
            $table->string("ISSN")->nullable();
            $table->foreignId("publisher_id")->references("id")->on("publishers");
            $table->string("language")->nullable();
            $table->integer("number_of_pages")->nullable();
            $table->string("description")->nullable();
            $table->string("cover")->nullable();
            $table->text("url")->nullable();;
            $table->boolean("status")->default(true);
            $table->foreignId("book_type_id")->references("id")->on("book_types");
            $table->foreignId("ddc_natural_id")->nullable()->references("id")->on("ddc_integers");
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
        Schema::dropIfExists('books');
    }
}
