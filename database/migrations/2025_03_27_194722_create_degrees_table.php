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
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_id')->constrained()->cascadeOnDelete();
            $table->foreignId('rank_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title', 100)->comment('Tên bằng cấp');
            $table->date('issued_date')->comment('Ngày cấp bằng');
            $table->string('certificate_number', 50)->unique()->nullable()->comment('Số chứng nhận');
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degrees');
    }
};
