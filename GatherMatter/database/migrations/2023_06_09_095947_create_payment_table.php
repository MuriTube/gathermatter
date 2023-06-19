<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('bookingID')->nullable()->index('BuchungID');
            $table->enum('status', ['paid', 'not paid', 'in progress'])->nullable();
            $table->decimal('amount')->nullable();
            $table->enum('method', ['Crypto', 'PayPal'])->nullable();
            $table->dateTime('paid_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
};
