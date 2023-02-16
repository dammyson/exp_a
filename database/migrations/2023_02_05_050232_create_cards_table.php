<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. php artisan migrate:refresh --path=/database/migrations/2023_02_05_050232_create_cards_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id')->default('');
            $table->string('merchant_card_id')->default('');
            $table->string('type')->default('');
            $table->string('brand')->default('');
            $table->string('currency')->default('');
            $table->string('maskedPan')->default('');
            $table->string('expiry_month')->default('');
            $table->string('expiry_year')->default('');
            $table->string('status')->default('');
            $table->text('spending_controls');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
