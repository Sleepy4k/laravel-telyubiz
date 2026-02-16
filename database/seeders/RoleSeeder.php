<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Role::query()->count() > 0) {
            return;
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = Role::factory()->make();

        Collection::make($roles->toArray())
            ->onlyIntegerKeys()
            ->each(function (array $role) {
                $permissions = $role['permissions'] ?? [];
                unset($role['permissions']);

                Role::create($role)->syncPermissions($permissions);
            });
    }
}
