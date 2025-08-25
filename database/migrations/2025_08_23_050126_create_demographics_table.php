<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // e.g., 'Pendidikan', 'Pekerjaan', 'Agama'
            $table->string('label'); // e.g., 'SD', 'SMP', 'Petani', 'Islam'
            $table->integer('value');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('demographics');
    }
};