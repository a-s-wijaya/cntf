<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdgsEmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdgs_emissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sdgs_list_id');
            $table->text('description');
            $table->string('co2_target');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('sdgs_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sdgs_emissions');
    }
}
