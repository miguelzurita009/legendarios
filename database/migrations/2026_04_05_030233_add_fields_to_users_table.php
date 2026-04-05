<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellido_paterno')->nullable()->after('name');
            $table->string('apellido_materno')->nullable()->after('apellido_paterno');
            $table->date('fecha_nacimiento')->nullable()->after('apellido_materno');
            $table->string('telefono')->nullable()->after('fecha_nacimiento');
            $table->string('ci')->nullable()->unique()->after('telefono');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
            'apellido_paterno',
            'apellido_materno',
            'fecha_nacimiento',
            'telefono',
            'ci',
        ]);
        });
    }
};
