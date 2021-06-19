<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergesTable extends Migration
{
    
   public function up()
    {
        Schema::create('merges', function (Blueprint $table) {
            $table->bigIncrements('ID');
            
            $table->integer('TodoID')->unsigned();
            $table->foreign('TodoID')->references('id')->on('todos');
            
            $table->integer('TagID')->unsigned();
            $table->foreign('TagID')->references('id')->on('tags');
            
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('merges');
    }
}
