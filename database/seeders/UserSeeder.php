<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (User::query()->withoutCache()->count() > 0) {
            return;
        }

        User::factory()->count(10)->active()->create();
    }
}
