<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('personal_access_tokens', static function(Blueprint $table): void {
            $table->dropMorphs('tokenable');
            $table->uuidMorphs('tokenable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_access_tokens', static function(Blueprint $table): void {
            $table->dropUuidMorphs('tokenable');
            $table->morphs('tokenable');
        });
    }
};
