<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama kendaraan
            $table->enum('type', ['car', 'motorcycle', 'bicycle']);
            $table->text('description')->nullable();
            $table->decimal('price_per_day', 10, 2);
            $table->string('image')->nullable();
            $table->enum('status', ['available', 'rented'])->default('available');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vehicles');
    }
};

