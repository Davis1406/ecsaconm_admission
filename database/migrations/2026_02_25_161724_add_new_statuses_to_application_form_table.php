<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
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

    public function down(): void
    {
        DB::statement("ALTER TABLE `application_form` MODIFY COLUMN `status` ENUM(
            'received',
            'question',
            'approved',
            'rejected'
        ) NULL");
    }
};
