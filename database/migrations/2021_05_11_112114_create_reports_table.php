<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("number_of_pages")->nullable();
            $table->string("academic_year")->nullable();
            $table->text("cover")->nullable();
            $table->text("url");
            $table->foreignId("level_id")->references("id")->on("levels");
            $table->foreignId("field_id")->references("id")->on("fields");
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
        Schema::dropIfExists('reports');
    }
}
