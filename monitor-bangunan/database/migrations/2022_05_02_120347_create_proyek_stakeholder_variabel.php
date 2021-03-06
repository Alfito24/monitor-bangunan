<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekStakeholderVariabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek_user_variabel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stakeholder_id')->unsigned();
            $table->bigInteger('variabel_id')->unsigned();
            $table->bigInteger('proyek_id')->unsigned();
            $table->foreign('stakeholder_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('variabel_id')->references('id')->on('variabels')->onDelete('cascade');
            $table->foreign('proyek_id')->references('id')->on('proyeks')->onDelete('cascade');
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
        Schema::dropIfExists('proyek_user_variabel');
    }
}
