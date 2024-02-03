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
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 20);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phone_numbers', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['customer_id']);
        });
        Schema::dropIfExists('phone_numbers');
    }
};
