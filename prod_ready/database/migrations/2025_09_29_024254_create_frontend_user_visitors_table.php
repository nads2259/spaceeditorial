<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('frontend_user_visitors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('frontend_user_id')->constrained('frontend_users')->cascadeOnDelete();
            $table->string('visitor_id', 64);
            $table->string('session_id', 64)->nullable();
            $table->timestamps();

            $table->unique(['frontend_user_id', 'visitor_id']);
            $table->index(['visitor_id', 'session_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('frontend_user_visitors');
    }
};
