<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE class_schedules MODIFY COLUMN level ENUM('A1', 'A2', 'B1', 'B2', 'C1', 'C2', 'P1', 'P2', 'P3', 'P4')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE class_schedules MODIFY COLUMN level ENUM('A1', 'A2', 'B1', 'B2')");
    }
};
