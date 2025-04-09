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
        Schema::create('wedding_couples', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->foreignId('invitation_id')->constrained('invitations')->onDelete('cascade');
            $table->string('bride_photo')->nullable();
            $table->string('bride_full_name');
            $table->string('bride_nickname');
            $table->integer('bride_child_number');
            $table->string('bride_mother_name');
            $table->string('bride_father_name');

            $table->string('groom_photo')->nullable();
            $table->string('groom_full_name');
            $table->string('groom_nickname');
            $table->integer('groom_child_number');
            $table->string('groom_mother_name');
            $table->string('groom_father_name');

            $table->string('opening_greeting');
            $table->text('text_greeting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_couples');
    }
};
