<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('filename');
            $table->string('original_name');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->unsignedInteger('landing_page_id');
            // $table->foreign('landing_page_id')->references('id')->on('landing_pages')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedInteger('gallery_id');
            // $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('images');
    }
}
