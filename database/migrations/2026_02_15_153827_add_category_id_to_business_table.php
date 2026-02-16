<?php

use App\Models\BusinessCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('businesses', static function(Blueprint $table): void {
            $table->foreignIdFor(BusinessCategory::class, 'category_id')->after('owner_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('businesses', static function(Blueprint $table): void {
            $table->dropForeignIdFor(BusinessCategory::class, 'category_id');
        });
    }
};
