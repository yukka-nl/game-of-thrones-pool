<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_question_answers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('house_question_id')->unsigned()->index();
            $table->foreign('house_question_id')->references('id')->on('house_questions')->onDelete('cascade');

            $table->integer('house_question_option_id')->unsigned()->index();
            $table->foreign('house_question_option_id')->references('id')->on('house_question_options')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('house_id')->unsigned()->index();
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');

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
        Schema::dropIfExists('house_question_answers');
    }
}
