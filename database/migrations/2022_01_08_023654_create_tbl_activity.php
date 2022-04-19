<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_activity', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->integer('category_id');
            $table->string('activity_name');
            $table->text('activity_desc');
            $table->string('activity_price');
            $table->string('activity_image');
            $table->integer('activity_status');
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
        Schema::dropIfExists('tbl_activity');
    }
}
