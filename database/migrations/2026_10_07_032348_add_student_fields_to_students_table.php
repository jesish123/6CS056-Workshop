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
        if (! Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone', 20);
                $table->string('address', 500)->nullable();
                $table->date('date_of_birth')->nullable();
                $table->timestamps();
            });

            return;
        }

        $columns = [
            'name' => fn (Blueprint $table) => $table->string('name'),
            'email' => fn (Blueprint $table) => $table->string('email'),
            'phone' => fn (Blueprint $table) => $table->string('phone', 20),
            'address' => fn (Blueprint $table) => $table->string('address', 500)->nullable(),
            'date_of_birth' => fn (Blueprint $table) => $table->date('date_of_birth')->nullable(),
        ];

        foreach ($columns as $column => $definition) {
            if (! Schema::hasColumn('students', $column)) {
                Schema::table('students', $definition);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('students')) {
            return;
        }

        $columns = ['name', 'email', 'phone', 'address', 'date_of_birth'];
        $existingColumns = array_filter(
            $columns,
            fn (string $column) => Schema::hasColumn('students', $column)
        );

        if ($existingColumns === []) {
            return;
        }

        Schema::table('students', function (Blueprint $table) use ($existingColumns) {
            $table->dropColumn($existingColumns);
        });
    }
};
