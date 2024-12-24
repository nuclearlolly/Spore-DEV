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
        //
        Schema::dropIfExists('recipe_limits');
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('is_limited');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('recipe_limits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->string('limit_type');
            $table->integer('limit_id');
            $table->integer('quantity')->default(1);
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->boolean('is_limited')->default(0);
        });
    }
};
