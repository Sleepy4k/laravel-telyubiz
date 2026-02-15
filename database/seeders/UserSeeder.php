<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) return;
        if (User::query()->withoutCache()->count() > 0) return;

        $users = User::factory()->count(10)->make();

        Collection::make($users->toArray())
            ->each(function (array $user) {
                $role = $user['role'] ?? config('rbac.role.default');
                $user['password'] = $user['password'] ?? 'password';
                unset($user['role']);

                User::create($user)->assignRole($role);
            });
    }
}
