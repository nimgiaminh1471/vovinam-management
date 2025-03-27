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
        Schema::create('rank_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id')->constrained()->cascadeOnDelete();
            $table->foreignId('previous_rank_id')->nullable()->constrained('ranks')->nullOnDelete()->comment('Cấp bậc cũ');
            $table->foreignId('new_rank_id')->constrained('ranks')->cascadeOnDelete()->comment('Cấp bậc mới');
            $table->date('promotion_date')->comment('Ngày thăng cấp');
            $table->text('notes')->nullable()->comment('Ghi chú');
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rank_histories');
    }
};
