<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_question_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');

            $table->boolean('is_correct')->nullable();

            $table->integer('house_question_id')->unsigned()->index();
            $table->foreign('house_question_id')->references('id')->on('house_questions')->onDelete('cascade');
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
        Schema::dropIfExists('house_question_options');
    }
}
