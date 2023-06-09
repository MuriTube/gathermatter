<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('location')->nullable();
            $table->integer('organizerID')->nullable()->index('organizerID');
            $table->integer('maxParticipants')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            $table->text('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
