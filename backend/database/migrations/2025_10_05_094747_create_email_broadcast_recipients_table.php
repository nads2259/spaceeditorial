<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_broadcast_recipients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('email_broadcast_id')->constrained('email_broadcasts')->cascadeOnDelete();
            $table->string('recipient_type', 30);
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->string('email');
            $table->string('token', 64)->unique();
            $table->string('status', 20)->default('pending');
            $table->unsignedInteger('click_count')->default(0);
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('clicked_at')->nullable();
            $table->timestamps();

            $table->index(['email_broadcast_id', 'recipient_type'], 'ebr_broadcast_type_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_broadcast_recipients');
    }
};
