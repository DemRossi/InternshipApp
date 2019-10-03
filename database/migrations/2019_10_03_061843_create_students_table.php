<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('bio'); //->nullable(); //mag nul zijn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    //hiermee kan je migraties ongedaan maken/terugrollen
    public function down()
    {
        Schema::dropIfExists('students');
    }
}