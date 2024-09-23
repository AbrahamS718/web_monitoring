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
        Schema::create('daily_check', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pv');
            $table->string('bays')->default('');
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->string('pic')->default('');

            $table->integer('v1_l1')->default('0');
            $table->integer('v1_r1')->default('0');
            $table->integer('v1_l2')->default('0');
            $table->integer('v1_r2')->default('0');
            $table->integer('v1_l3')->default('0');
            $table->integer('v1_r3')->default('0');
            $table->integer('v1_l4')->default('0');
            $table->integer('v1_r4')->default('0');

            $table->integer('v2_l1')->default('0');
            $table->integer('v2_r1')->default('0');
            $table->integer('v2_l2')->default('0');
            $table->integer('v2_r2')->default('0');
            $table->integer('v2_l3')->default('0');
            $table->integer('v2_r3')->default('0');
            $table->integer('v2_l4')->default('0');
            $table->integer('v2_r4')->default('0');

            $table->integer('d_l1')->default('0');
            $table->integer('d_r1')->default('0');
            $table->integer('d_l2')->default('0');
            $table->integer('d_r2')->default('0');
            $table->integer('d_l3')->default('0');
            $table->integer('d_r3')->default('0');

            $table->text('keterangan')->nullable();
            $table->enum('status', [
                'rfu',
                'breakdown',
                'vessel waiting prime mover',
                'prime mover waiting vessel',
                'service vessel'
            ])->default('rfu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_check');
    }
};
