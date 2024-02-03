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
        Schema::create('achat_lignes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achat_id');
            $table->unsignedBigInteger('article_id');
            $table->decimal('buying_price', 10, 2)->default(0)->unsigned();
            $table->integer('quantity')->unsigned();
            $table->foreign('achat_id')->references('id')->on('achats');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('achats_lignes', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['achat_id']);
        });
        Schema::dropIfExists('achat_lignes');
    }
};
