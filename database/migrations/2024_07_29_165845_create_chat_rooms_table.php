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
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_admin_id')->nullable()->comment('For Group');
            $table->foreign('room_admin_id')->on('users')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('user_id_1')->nullable()->comment('For Single');
            $table->foreign('user_id_1')->on('users')->references('id')->onDelete('cascade');

            $table->unsignedBigInteger('user_id_2')->nullable()->comment('For Single');;
            $table->foreign('user_id_2')->on('users')->references('id')->onDelete('cascade');

            $table->enum('type', ['Single', 'Group'])->default('Single');
            $table->string('room_secret_key')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_rooms');
    }
};
