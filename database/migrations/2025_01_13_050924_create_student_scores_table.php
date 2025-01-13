<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentScoresTable extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_mhs', function (Blueprint $table) {
            $table->id();
            $table->integer('kehadiran');  // Kehadiran (20%)
            $table->integer('tugas1')->nullable();  // Tugas 1
            $table->integer('tugas2')->nullable();  // Tugas 2
            $table->integer('tugas3')->nullable();  // Tugas 3
            $table->integer('tugas4')->nullable();  // Tugas 4
            $table->integer('tugas5')->nullable();  // Tugas 5
            $table->integer('tugas6')->nullable();  // Tugas 6
            $table->integer('respon1')->nullable();  // Respon 1 (5%)
            $table->integer('respon2')->nullable();  // Respon 2 (5%)
            $table->integer('respon3')->nullable();  // Respon 3 (10%)
            $table->integer('respon4')->nullable();  // Respon 4 (15%)
            $table->integer('respon5')->nullable();  // Respon 5 (15%)
            $table->float('final_score')->nullable();  // Total nilai
            $table->string('grade')->nullable();  // Nilai huruf
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_scores');
    }
}
