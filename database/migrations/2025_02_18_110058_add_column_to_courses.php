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
        Schema::table('courses', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name');
            $table->string('location')->nullable()->after('course_type');
            $table->string('google_meet_link')->nullable()->after('location');
            $table->integer('max_students')->nullable()->after('name'); 
            $table->boolean('is_active')->default(true)->after('max_students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['description', 'location', 'google_meet_link', 'max_students', 'is_active']);
        });
    }
};
