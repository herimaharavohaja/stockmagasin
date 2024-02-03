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
        Schema::create('stock_mouvements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('article_id');
            $table->date('movement_date');
            $table->integer('quantity');
            $table->string('movement_type', 10);
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stock_movements', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']);
            $table->dropForeign(['article_id']);
        });

        Schema::dropIfExists('stock_mouvements');
    }
};
