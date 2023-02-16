<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.  php artisan migrate --path=/database/migrations/2014_10_12_000000_create_users_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('customer_id')->default('');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number', 15);
            $table->string('email', 50)->unique();
            $table->string('dob')->default('');
            $table->string('gender')->default('');
            $table->string('avatar')->nullable();
            $table->string('code', 20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('');
            $table->timestamp('last_login')->nullable();
            $table->string('confirmation_token', 60)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

