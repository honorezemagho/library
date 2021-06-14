<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkLendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_lendings', function (Blueprint $table) {
            $table->id();
            $table->date("date_issued",100);
            $table->date("date_due_for_return",100);
            $table->date("date_return",100);
            $table->bigInteger('work_id')->unsigned(); // ex: (int) 1
            $table->string('type_work'); // ex: App\Model\Report
            $table->foreignId("work_reservation_id")->nullable()->references("id")->on("book_reservations");
            $table->foreignId("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkLendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_lendings', function (Blueprint $table) {
            $table->id();
            $table->date("date_issued",100);
            $table->date("date_due_for_return",100);
            $table->date("date_return",100);
            $table->bigInteger('work_id')->unsigned(); // ex: (int) 1
            $table->string('type_work'); // ex: App\Model\Report
            $table->foreignId("work_reservation_id")->nullable()->references("id")->on("book_reservations");
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
        Schema::dropIfExists('work_lendings');
    }
}
