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
        Schema::create('inquiries_and_responses', function (Blueprint $table) {
            $table->id();
            $table->text("question")->nullable();
            $table->text("response")->nullable();
            $table->foreignId("user_id")->constrained()->onUpdate("cascade")->onDelete("cascade")->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('responded_at')->nullable();
            $table->enum('status', ['New', 'Replied'])->default('New');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries_and_responses');
    }
};
