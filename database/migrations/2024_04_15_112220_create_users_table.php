<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('group')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('random_password');
            $table->string('photo')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('phone_number');
            $table->string('country_code')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode');
            $table->integer('region_id')->default(0);
            $table->string('id_proof');
            $table->string('id_number');
            $table->integer('social_document_id')->nullable();
            $table->integer('role_as')->default(0);
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->enum('subscribed', ['1', '0'])->default(0)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
