<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First widen the ENUM to allow both old (proffesor) and new (professor) values
        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `title` ENUM('proffesor','professor','doctor','mr','mrs','miss') NOT NULL");

        // Migrate existing records with the old typo to the correct value
        DB::table('application_form')->where('title', 'proffesor')->update(['title' => 'professor']);

        // Now remove the old typo value from the ENUM
        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `title` ENUM('professor','doctor','mr','mrs','miss') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Widen ENUM to allow both values during rollback
        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `title` ENUM('proffesor','professor','doctor','mr','mrs','miss') NOT NULL");

        // Revert professor back to proffesor
        DB::table('application_form')->where('title', 'professor')->update(['title' => 'proffesor']);

        // Restore original ENUM with the typo
        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `title` ENUM('proffesor','doctor','mr','mrs','miss') NOT NULL");
    }
};
