<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('village_officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // e.g., 'Kepala Desa', 'Sekretaris Desa'
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
            $table->enum('type', ['kepala_desa', 'perangkat_desa']);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('village_officials');
    }
};