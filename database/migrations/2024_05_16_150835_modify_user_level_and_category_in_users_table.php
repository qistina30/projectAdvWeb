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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('userLevel')->default(1)->change();
            $table->string('userCategory')->default('volunteer')->change();
            $table->enum('approval_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('phone')->nullable();
        });

    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('userLevel')->default(null)->change();
            $table->string('userCategory')->default(null)->change();
            $table->dropColumn('approval_status');
            $table->dropColumn('phone');
        });

    }
};
