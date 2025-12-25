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
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('delivery_method', ['self_pickup', 'delivery'])->default('self_pickup')->after('total_price');
            $table->string('pickup_location')->nullable()->after('delivery_method');
            $table->string('delivery_address')->nullable()->after('pickup_location');
            $table->string('return_address')->nullable()->after('delivery_address');
            $table->bigInteger('delivery_fee')->default(0)->after('return_address');
            $table->text('billing_info')->nullable()->after('delivery_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['delivery_method', 'pickup_location', 'delivery_address', 'return_address', 'delivery_fee', 'billing_info']);
        });
    }
};
