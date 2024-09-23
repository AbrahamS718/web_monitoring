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
        Schema::create('connect_p2v', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vessel');
            $table->bigInteger('PM');
            $table->string('location')->default('');
            $table->string('hm_pm')->default('');
            $table->string('hm_vessel')->default('');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->string('pic')->default('');
            $table->string('bukti_foto')->nullable();

            $table->enum('fifthwheel_001', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('fifthwheel_002', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('fifthwheel_003', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('fifthwheel_004', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->text('fifthwheel_001_mark')->nullable();
            $table->text('fifthwheel_002_mark')->nullable();
            $table->text('fifthwheel_003_mark')->nullable();
            $table->text('fifthwheel_004_mark')->nullable();

            $table->enum('brakesystem_001', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('brakesystem_002', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('brakesystem_003', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('brakesystem_004', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('brakesystem_005', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('brakesystem_006', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('brakesystem_007', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->text('brakesystem_001_mark')->nullable();
            $table->text('brakesystem_002_mark')->nullable();
            $table->text('brakesystem_003_mark')->nullable();
            $table->text('brakesystem_004_mark')->nullable();
            $table->text('brakesystem_005_mark')->nullable();
            $table->text('brakesystem_006_mark')->nullable();
            $table->text('brakesystem_007_mark')->nullable();

            $table->enum('dumpingtest_001', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('dumpingtest_002', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('dumpingtest_003', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('dumpingtest_004', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('dumpingtest_005', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->text('dumpingtest_001_mark')->nullable();
            $table->text('dumpingtest_002_mark')->nullable();
            $table->text('dumpingtest_003_mark')->nullable();
            $table->text('dumpingtest_004_mark')->nullable();
            $table->text('dumpingtest_005_mark')->nullable();

            $table->enum('electricalsystem_001', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('electricalsystem_002', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('electricalsystem_003', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('electricalsystem_004', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('electricalsystem_005', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->text('electricalsystem_001_mark')->nullable();
            $table->text('electricalsystem_002_mark')->nullable();
            $table->text('electricalsystem_003_mark')->nullable();
            $table->text('electricalsystem_004_mark')->nullable();
            $table->text('electricalsystem_005_mark')->nullable();

            $table->enum('safetyeq_001', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('safetyeq_002', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('safetyeq_003', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('safetyeq_004', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->enum('safetyeq_005', ['good', 'bad', 'improv', 'repaired'])->default('good');
            $table->text('safetyeq_001_mark')->nullable();
            $table->text('safetyeq_002_mark')->nullable();
            $table->text('safetyeq_003_mark')->nullable();
            $table->text('safetyeq_004_mark')->nullable();
            $table->text('safetyeq_005_mark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
