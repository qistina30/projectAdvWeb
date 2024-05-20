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
        Schema::table('books', function (Blueprint $table) {
            // Add book_status column
            $table->string('book_status')->default('Available');

            // Add volunteer_id foreign key
            $table->foreignId('volunteer_id')
                ->nullable()
                ->constrained('volunteers')
                ->onDelete('set null');
            //$table->softDeletes();
        });
       /* Schema::table('books', function (Blueprint $table) {
            $table->softDeletes();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Drop book_status column
            $table->dropColumn('book_status');

            // Drop volunteer_id foreign key
            $table->dropForeign(['volunteer_id']);
            $table->dropColumn('volunteer_id');
        });
    }
};
