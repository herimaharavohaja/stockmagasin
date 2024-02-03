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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('commande_id');
            $table->integer('selling_price')->unsigned()->default(0);
            $table->integer('quantity')->unsigned()->default(0);

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
        Schema::table('lignes_commandes', function (Blueprint $table) {
        $table->dropForeign(['article_id']);
        $table->dropForeign(['commande_id']);
    });

        Schema::dropIfExists('ligne_commandes');
    }
};
