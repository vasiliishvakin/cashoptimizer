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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->foreignId('account_type_id')->constrained()->restrictOnDelete();
            $table->string('currency_id', 4);
            $table->foreign('currency_id')->references('id')->on('currencies')->restrictOnDelete();
            $table->decimal('balance', config('money.decimal.total'),config('money.decimal.places'));

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
