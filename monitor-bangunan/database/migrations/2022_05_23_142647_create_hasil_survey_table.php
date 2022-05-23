<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_survey', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('survey_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
            $table->integer('exp_var1');
            $table->integer('real_var1');
            $table->integer('exp_var2');
            $table->integer('real_var2');
            $table->integer('exp_var3');
            $table->integer('real_var3');
            $table->integer('exp_var4');
            $table->integer('real_var4');
            $table->integer('exp_var5');
            $table->integer('real_var5');
            $table->integer('exp_var6');
            $table->integer('real_var6');
            $table->integer('exp_var7');
            $table->integer('real_var7');
            $table->integer('exp_var8');
            $table->integer('real_var8');
            $table->integer('exp_var9');
            $table->integer('real_var9');
            $table->integer('exp_var10');
            $table->integer('real_var10');
            $table->integer('exp_var11');
            $table->integer('real_var11');
            $table->integer('exp_var12');
            $table->integer('real_var12');
            $table->integer('exp_var13');
            $table->integer('real_var13');
            $table->integer('exp_var14');
            $table->integer('real_var14');
            $table->integer('exp_var15');
            $table->integer('real_var15');
            $table->integer('exp_var16');
            $table->integer('real_var16');
            $table->integer('exp_var17');
            $table->integer('real_var17');
            $table->integer('exp_var18');
            $table->integer('real_var18');
            $table->integer('exp_var19');
            $table->integer('real_var19');
            $table->integer('exp_var20');
            $table->integer('real_var20');
            $table->integer('exp_var21');
            $table->integer('real_var21');
            $table->integer('exp_var22');
            $table->integer('real_var22');
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
        Schema::dropIfExists('hasil_survey');
    }
}
