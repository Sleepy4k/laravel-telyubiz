<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Database\Seeder;

class UserSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (UserSetting::query()->withoutCache()->count() > 0) {
            return;
        }

        $users = User::query()->withoutCache()->select('id')->get();
        $settings = UserSetting::factory()->count($users->count())->make();

        $settingsWithUserId = $settings->map(function (UserSetting $setting, int $index) use ($users) {
            $setting->user_id = $users->get($index % $users->count())->id;

            return $setting;
        });

        UserSetting::query()->insert($settingsWithUserId->toArray());
    }
}
