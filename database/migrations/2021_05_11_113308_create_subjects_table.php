<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("academic_year")->nullable();
            $table->string("cover")->nullable();
            $table->text("url");
            $table->foreignId("level_id")->references("id")->on("levels");
            $table->foreignId("field_id")->references("id")->on("fields");
            $table->foreignId("period_id")->references("id")->on("periods");
            $table->foreignId("author_id")->references("id")->on("authors");
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
        Schema::dropIfExists('subjects');
    }
}
