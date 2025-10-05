<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_click_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('email_broadcast_id')->constrained('email_broadcasts')->cascadeOnDelete();
            $table->foreignId('email_broadcast_recipient_id')->constrained('email_broadcast_recipients')->cascadeOnDelete();
            $table->string('recipient_type', 30);
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->string('email');
            $table->text('url');
            $table->timestamp('clicked_at')->nullable();
            $table->timestamps();

            $table->index(['email_broadcast_id', 'recipient_type'], 'ecl_broadcast_type_idx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_click_logs');
    }
};
