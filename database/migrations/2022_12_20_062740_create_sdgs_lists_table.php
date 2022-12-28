<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdgsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdgs_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sdgs_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('sdgs_id')->references('id')->on('sdgs_masters');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sdgs_lists');
    }
}
