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
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livraison_id');
            $table->unsignedBigInteger('commande_id');
            $table->unsignedBigInteger('article_id');
            $table->unsignedInteger('quantity_delivered')->default(0);

            $table->foreign('livraison_id')->references('id')->on('livraisons');
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->foreign('article_id')->references('id')->on('articles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery_details', function (Blueprint $table) {
            $table->dropForeign(['livraison_id']);
            $table->dropForeign(['commande_id']);
            $table->dropForeign(['article_id']);
        });
        Schema::dropIfExists('delivery_details');
    }
};
