<?php

use App\Enums\OrderStatus;
use App\Models\Business;
use App\Models\Event;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class, 'buyer_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Business::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Event::class)->nullable()->constrained()->nullOnDelete();
            $table->decimal('total_amount', 10, 2);
            $table->boolean('is_paid')->default(false);
            $table->enum('status', array_map(fn ($case) => $case->value, OrderStatus::cases()))->default(OrderStatus::PENDING->value);
            $table->text('payment_gateway_reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
