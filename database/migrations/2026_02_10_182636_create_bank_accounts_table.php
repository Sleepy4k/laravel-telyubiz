<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_accounts', static function(Blueprint $table): void {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('bank_name', 100);
            $table->string('account_number', 50)->unique();
            $table->string('account_holder_name', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
