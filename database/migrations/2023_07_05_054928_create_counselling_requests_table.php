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
        Schema::create('counselling_requests', function (Blueprint $table) {
            $table->id();
            $table->longText('counseling_purpose');
            $table->dateTime('requested_date')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->boolean('urgency')->default(0);
            $table->foreignId('requester_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counselling_requests');
    }
};
