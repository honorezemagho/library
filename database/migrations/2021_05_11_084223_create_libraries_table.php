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
            $table->string("hero_image_title");
            $table->string("hero_image_desc")->nullable();
            $table->string("lib_default_language");
            $table->string("lib_email")->nullable();
            $table->text("lib_desc")->nullable();
            $table->string("lib_site_url")->nullable();
            $table->string("phone1")->nullable();
            $table->string("phone2")->nullable();
            $table->integer("default_issue_days");
            $table->integer("max_issue_book_limit");
            $table->integer("max_reserv_book_limit");
            $table->integer("fine_per_overdue_day");
            $table->integer("book_due_reminder_before_Days");
            $table->string("currency",50);
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
