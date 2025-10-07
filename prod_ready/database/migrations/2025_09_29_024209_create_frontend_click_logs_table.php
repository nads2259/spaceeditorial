<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('frontend_click_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('frontend_user_id')->nullable()->constrained('frontend_users')->nullOnDelete();
            $table->string('visitor_id', 64);
            $table->string('session_id', 64)->nullable();
            $table->string('label')->nullable();
            $table->string('url', 512);
            $table->json('context')->nullable();
            $table->timestamps();

            $table->index(['frontend_user_id', 'created_at']);
            $table->index(['visitor_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('frontend_click_logs');
    }
};
