<?php

use App\Models\Business;
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
        Schema::create('business_operationals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Business::class)->constrained()->cascadeOnDelete();
            $table->string('day_of_week', 25);
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_operationals');
    }
};
