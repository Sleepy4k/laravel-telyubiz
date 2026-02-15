<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('cache:clear', [
            '--no-interaction' => true,
            '--quiet' => app()->isProduction(),
        ]);

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            BusinessSeeder::class,
            EventCategorySeeder::class,
            EventSeeder::class,
            EventHasCategorySeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductOptionSeeder::class,
            ProductDetailSeeder::class,
        ]);
    }
}
