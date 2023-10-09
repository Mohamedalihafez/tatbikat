<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governorate_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('governorate_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name')->unique();

            $table->unique(['governorate_id', 'locale']);
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('governorate_translations');
    }
};