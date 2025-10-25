<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Drop the old foreign key constraint
            $table->dropForeign(['hangout_id']);

            // Add the correct foreign key constraint pointing to events table
            $table->foreign('hangout_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            // Reverse the changes
            $table->dropForeign(['hangout_id']);
            $table->foreign('hangout_id')->references('id')->on('hangouts')->onDelete('set null');
        });
    }
};
