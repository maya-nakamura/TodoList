<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergesTable extends Migration
{
   public function up(){
        Schema::create('merges', function (Blueprint $table) {
            $table->increments('id')->unique();
            
            $table->unsignedBigInteger('todo_id');
            $table->foreign('todo_id')->references('id')->on('todos');
            
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            
            $table->softDeletes();
        });
    }
    public function down(){
        Schema::dropIfExists('merges');
    }
}
