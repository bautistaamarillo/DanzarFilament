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
        Schema::create('item_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("item_id")->nullable();
            $table->unsignedBigInteger("payment_id")->nullable();
            $table->integer("price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_payments');
    }
};
