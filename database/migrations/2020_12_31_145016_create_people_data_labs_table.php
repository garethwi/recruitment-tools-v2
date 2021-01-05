<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleDataLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_data_labs', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('linkedin_url', 255);
            $table->longText('data')->nullable();
            $table->string('status', 20);
            $table->timestamps();
            $table->index('linkedin_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_data_labs');
    }
}
