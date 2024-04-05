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
        Schema::create('hadith_details', function (Blueprint $table) {
            $table->id();
            $table->text("title_ar");
            $table->text("title_en");
            $table->text("desc_ar");
            $table->text("desc_en");
            $table->foreignId("hadiths_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadith_details');
    }
};
