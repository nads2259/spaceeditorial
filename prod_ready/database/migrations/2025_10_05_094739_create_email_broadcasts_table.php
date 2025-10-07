<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_broadcasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('email_template_id')->constrained('email_templates')->cascadeOnDelete();
            $table->string('audience', 30);
            $table->string('subject');
            $table->longText('html_body');
            $table->longText('text_body')->nullable();
            $table->string('status', 20)->default('queued');
            $table->unsignedInteger('total_recipients')->default(0);
            $table->unsignedInteger('sent_count')->default(0);
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            $table->index(['audience', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_broadcasts');
    }
};
