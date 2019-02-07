<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value')->nullable();
            $table->timestamps();
        });

        Schema::table('characters', function (Blueprint $table) {
            $table->integer('alive_prediction_count')->default(0);
            $table->integer('dead_prediction_count')->default(0);
            $table->integer('wight_prediction_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
        Schema::table('characters', function (Blueprint $table) {
            $table->dropColumn('alive_prediction_count');
            $table->dropColumn('dead_prediction_count');
            $table->dropColumn('wight_prediction_count');
        });
    }
}
