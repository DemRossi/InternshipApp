<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->uuid('uuid');
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('phoneNumber');
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('street');
            $table->string('streetNumber');
            $table->string('city');
            $table->string('state');
            $table->string('postalCode');
            $table->bigInteger('employees');
            $table->bigInteger('user_id');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
