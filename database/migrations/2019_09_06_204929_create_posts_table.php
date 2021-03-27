<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo', 150);
            $table->text('contenido')->nullable();
            $table->unsignedInteger('id_autor');
            $table->foreign('id_autor')->references('id')->on('users');
            $table->unsignedInteger('estado');
            $table->timestamps(4);
            //$table->timestamp('fecha_creacion', 4)->nullable();
            //$table->timestamp('fecha_actualizacion', 4)->nullable();
            //$table->timestamp('fecha_borrado', 4)->nullable(); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
