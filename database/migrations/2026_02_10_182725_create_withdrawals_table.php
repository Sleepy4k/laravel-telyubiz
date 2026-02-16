<?php

use App\Enums\WithdrawalStatus;
use App\Models\BankAccount;
use App\Models\Business;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('withdrawals', static function(Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Business::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(BankAccount::class, 'bank_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('status', array_map(static fn($case) => $case->value, WithdrawalStatus::cases()))->default(WithdrawalStatus::REQUESTED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
