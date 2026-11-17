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
            $table->string('role')->default('admin')->after('email'); // 'admin', 'operator_desa'
            $table->string('kecamatan')->nullable()->after('role');
            $table->string('desa')->nullable()->after('kecamatan');
            $table->string('phone')->nullable()->after('desa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'kecamatan', 'desa', 'phone']);
        });
    }
};
