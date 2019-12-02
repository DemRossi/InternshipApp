<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('internship_function')->nullable();
            $table->text('internship_discription')->nullable();
            $table->integer('available_spots');
            $table->uuid('company_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
