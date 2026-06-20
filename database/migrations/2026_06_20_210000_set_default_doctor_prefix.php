<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('doctors')
            ->whereNull('doctor_prefix')
            ->orWhere('doctor_prefix', '')
            ->update(['doctor_prefix' => 'Dr.']);

        Schema::table('doctors', function (Blueprint $table) {
            $table->string('doctor_prefix')->default('Dr.')->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('doctor_prefix')->nullable()->default(null)->change();
        });
    }
};
