<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('name');
            $table->string('father_name');
            $table->string('nominee_name');
            $table->string('relation_with_nominee');
            $table->string('other_relation')->nullable();
            $table->string('address');
            $table->string('block_tahsil');
            $table->string('police_station');
            $table->string('post_office');
            $table->string('district');
            $table->string('state');
            $table->string('pincode');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->integer('otp')->nullable();
            $table->string('referral_code')->nullable()->unique();
            $table->integer('referral_by')->nullable();
            $table->double('balance')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
