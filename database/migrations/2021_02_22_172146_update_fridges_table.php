<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFridgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fridges', function ($table)  {
            $table->integer('number_racks_bulk')->default(4);
            $table->integer('number_racks_door')->default(4);
            $table->integer('max_capacity')->default(50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fridges', function ($table) {
            $table->dropColumn('number_racks_bulk');
            $table->dropColumn('number_racks_door');
            $table->dropColumn('max_capacity');
        });
    }
}
