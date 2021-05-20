<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string("lib_name");
            $table->string("lib_title");
            $table->string("lib_default_language");
            $table->string("lib_email");
            $table->text("lib_description");
            $table->string("lib_site_url");
            $table->integer("default_issue_days");
            $table->integer("max_issue_book_limit");
            $table->integer("fine_per_overdue_day");
            $table->string("currency");
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
        Schema::dropIfExists('libraries');
    }
}
