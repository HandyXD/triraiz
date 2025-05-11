<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->string('banner_image')->nullable();
            $table->string('logo')->nullable();
            $table->text('history')->nullable();
            $table->text('traditions')->nullable();
            $table->text('contact_info')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });

        // Agregar la relación de llave foránea después de crear ambas tablas
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['community_id']);
        });
        Schema::dropIfExists('communities');
    }
};
