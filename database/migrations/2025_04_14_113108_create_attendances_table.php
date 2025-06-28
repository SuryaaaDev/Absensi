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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->date('attendance_date')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->unsignedBigInteger('status_id')->default(1)->nullable();
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->nullOnDelete();

            // kombinasi unik: satu siswa hanya satu data per tanggal
            $table->unique(['student_id', 'attendance_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
