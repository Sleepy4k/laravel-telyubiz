<?php

use App\Models\Event;
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
        Schema::create('event_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Event::class)->constrained()->cascadeOnDelete();
            $table->integer('capacity')->nullable()->default(0);
            $table->boolean('free_entry')->default(false);
            $table->float('ticket_price')->nullable()->default(0);
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_details');
    }
};
