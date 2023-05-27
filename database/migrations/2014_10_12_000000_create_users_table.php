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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')
                ->unique();
            $table->string('email')
                ->unique();
            $table->string('name');
            $table->integer('role')
                ->default(1); //TODO: add foreign key
            $table->string('avatar')
                ->nullable();
            $table->dateTime('email_verified_at')
                ->nullable();
            $table->string('password');
            $table->string('locale')
                ->default('de');
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
