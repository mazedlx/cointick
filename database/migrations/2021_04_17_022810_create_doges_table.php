<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDogesTable extends Migration
{
    public function up()
    {
        Schema::create('doges', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('doges');
    }
}
