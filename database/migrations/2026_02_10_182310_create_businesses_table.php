<?php

use App\Enums\BusinessStatus;
use App\Models\User;
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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'owner_id')->constrained()->onDelete('cascade');
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->text('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('description')->nullable();
            $table->text('logo_url')->nullable();
            $table->text('banner_url')->nullable();
            $table->enum('status', array_map(fn ($case) => $case->value, BusinessStatus::cases()))->default(BusinessStatus::ACTIVE->value);
            $table->decimal('balance', 9, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
