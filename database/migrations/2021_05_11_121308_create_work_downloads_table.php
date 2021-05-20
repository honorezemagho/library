<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_downloads', function (Blueprint $table) {
            $table->id();
            $table->date("date_download");
            $table->bigInteger('work_id')->unsigned(); // ex: (int) 1
            $table->string('type_work'); // ex: App\Model\Report
            $table->foreignId("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('book_downloads');
    }
}
