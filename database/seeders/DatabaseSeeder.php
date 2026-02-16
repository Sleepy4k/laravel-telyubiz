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
            UserDetailSeeder::class,
            UserSettingSeeder::class,
            BankAccountSeeder::class,
            BusinessCategorySeeder::class,
            BusinessSeeder::class,
            BusinessOperationalSeeder::class,
            EventCategorySeeder::class,
            EventSeeder::class,
            EventHasCategorySeeder::class,
            EventDetailSeeder::class,
            EventFacilitySeeder::class,
            EventTermSeeder::class,
            EventTimelineSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            ProductOptionSeeder::class,
            ProductDetailSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
