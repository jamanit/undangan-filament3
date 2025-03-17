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
        Schema::create('closings', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->foreignId('invitation_id')->constrained('invitations')->onDelete('cascade');
            $table->text('closing_text');
            $table->string('closing_greeting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('closings');
    }
};
