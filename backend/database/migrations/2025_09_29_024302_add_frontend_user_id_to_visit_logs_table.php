<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visit_logs', function (Blueprint $table) {
            if (! Schema::hasColumn('visit_logs', 'frontend_user_id')) {
                $table->foreignId('frontend_user_id')->nullable()->after('session_id')->constrained('frontend_users')->nullOnDelete();
                $table->index(['frontend_user_id', 'created_at']);
            }
        });
    }

    public function down(): void
    {
        Schema::table('visit_logs', function (Blueprint $table) {
            if (Schema::hasColumn('visit_logs', 'frontend_user_id')) {
                $table->dropConstrainedForeignId('frontend_user_id');
            }
        });
    }
};
