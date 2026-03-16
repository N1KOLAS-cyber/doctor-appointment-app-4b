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
            if (! Schema::hasColumn('users', 'id_number')) {
                $table->string('id_number')->nullable()->after('password');
            }
            if (! Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('id_number');
            }
            if (! Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable()->after('phone');
            }
        });

        // Si id_number existe pero no es unique, no lo cambiamos para no romper datos existentes.
        // Opcional: convertir a unique cuando ya no haya nulls:
        // Schema::table('users', fn (Blueprint $t) => $t->unique('id_number'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_number', 'phone', 'address']);
        });
    }
};
