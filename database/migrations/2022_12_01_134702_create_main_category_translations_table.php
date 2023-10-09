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
        Schema::create('main_category_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_category_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name')->unique();

            $table->unique(['main_category_id', 'locale']);
            $table->foreign('main_category_id')->references('id')->on('main_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_category_translations');
    }
};