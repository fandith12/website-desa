<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('male_count');
            $table->integer('female_count');
            $table->integer('total_population');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('populations');
    }
};