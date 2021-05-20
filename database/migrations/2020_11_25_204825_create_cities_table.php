<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{

    public function up(){
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->foreignId('country_id')->unsigned()->nullable()->references('id')->on('countries')->onDelete('cascade');;
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
        Schema::dropIfExists('cities');
    }
}
