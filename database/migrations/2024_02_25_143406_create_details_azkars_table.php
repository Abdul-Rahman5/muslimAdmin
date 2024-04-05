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
        Schema::create('details_azkars', function (Blueprint $table) {
            $table->id();
            $table->text("title_ar");
            $table->text("title_en");
            $table->integer("repeat");
            $table->text("reward_ar");
            $table->text("reward_en");
            $table->foreignId("cateogry_azkars_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_azkars');
    }
};
