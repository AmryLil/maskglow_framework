<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespon4Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('respon4', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->integer('kehadiran');  // Nilai kehadiran (20%)
            $table->float('tugas');  // Total nilai tugas (30%)
            $table->float('project');  // Total nilai project/respon
            $table->float('total');  // Total nilai keseluruhan
            $table->string('huruf');  // Nilai huruf (grade)
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('respon4');
    }
}
