<?php

use App\Models\Product;
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
        Schema::create('product_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->json('images')->nullable();
            $table->boolean('discount_active')->default(false);
            $table->decimal('discount_amount', 25, 2)->nullable();
            $table->enum('discount_type', ['percentage', 'fixed'])->nullable();
            $table->timestamp('discount_start_date')->nullable();
            $table->timestamp('discount_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
