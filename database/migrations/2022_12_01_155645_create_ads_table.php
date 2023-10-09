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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable()->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('main_category_id')->unsigned();
            $table->foreign('main_category_id')->references('id')->on('main_categories')->onDelete('cascade');
            $table->integer('sub_category_id')->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->integer('governorate_id')->unsigned();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->integer('offer_id')->nullable()->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->string('offer_name')->nullable();
            $table->string("name")->unique();
            $table->string("slug")->unique();
            $table->string("type")->nullable();
            $table->enum("condition", ["new", "used"])->nullable();
            $table->longText("description");
            $table->string("thumbnail");
            $table->decimal("price", 11, 2);
            $table->string("user_name");
            $table->string("user_phone");
            $table->enum("contact", ["phone", "chat", "both"]);
            $table->enum("status", ["active", "inactive", "pending", "moderated"])->default("moderated");
            $table->enum("certification", ["trusted", "untrusted", "moderated"])->default("moderated");
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
        Schema::dropIfExists('ads');
    }
};