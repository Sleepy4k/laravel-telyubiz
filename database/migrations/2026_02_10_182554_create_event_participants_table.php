<?php

use App\Enums\EventParticipantStatus;
use App\Models\Business;
use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_participants', static function(Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Event::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Business::class)->constrained()->onDelete('cascade');
            $table->enum('status', array_map(static fn($case) => $case->value, EventParticipantStatus::cases()))->default(EventParticipantStatus::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_participants');
    }
};
