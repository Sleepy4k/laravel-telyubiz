<?php

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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'created_by')->constrained()->onDelete('cascade');
            $table->string('title', 150);
            $table->string('slug', 150)->unique();
            $table->text('description')->nullable();
            $table->text('location')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->integer('capacity')->nullable()->default(0);
            $table->boolean('is_open_for_registration')->default(false);
            $table->text('logo_url')->nullable();
            $table->text('banner_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
