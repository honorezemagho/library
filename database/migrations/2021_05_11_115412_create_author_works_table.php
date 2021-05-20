<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_work_id')->unsigned()->nullable(); // ex: (int) 1
            $table->string('author_work_type'); // ex: App\Model\Report
            $table->foreignId("author_id")->references("id")->on("authors");
            $table->string("status");
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
        Schema::dropIfExists('authors_works');
    }
}
