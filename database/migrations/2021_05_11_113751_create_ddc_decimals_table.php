<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdcDecimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddc_decimals', function (Blueprint $table) {
            $table->id();
            $table->string("decimal_title");
            $table->string("decimal_code");
            $table->foreignId("ddc_natural_id")->references("id")->on("ddc_integers");
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
        Schema::dropIfExists('ddc_decimals');
    }
}
