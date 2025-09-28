<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_id', 64);
            $table->string('session_id', 64)->nullable();
            $table->string('url', 512);
            $table->string('referrer', 512)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('locale', 20)->nullable();
            $table->json('context')->nullable();
            $table->timestamps();

            $table->index(['visitor_id', 'url']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visit_logs');
    }
};
