<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('educational_resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('file_path')->nullable();
            $table->string('external_url')->nullable();
            $table->enum('type', ['course', 'tutorial', 'document', 'video', 'audio']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('community_id')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('educational_resources');
    }
};
