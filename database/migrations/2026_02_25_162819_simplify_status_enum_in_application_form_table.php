<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Remap any values that no longer exist to a valid status before narrowing the ENUM
        DB::table('application_form')
            ->whereIn('status', ['in_application', 'invoiced', 'withdrawn', 'payment_pending'])
            ->update(['status' => 'received']);

        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `status` ENUM(
            'received',
            'question',
            'approved',
            'rejected',
            'closed'
        ) NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `status` ENUM(
            'received',
            'in_application',
            'question',
            'approved',
            'invoiced',
            'rejected',
            'withdrawn',
            'closed',
            'payment_pending'
        ) NULL");
    }
};
