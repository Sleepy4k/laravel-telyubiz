<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (UserDetail::query()->withoutCache()->count() > 0) {
            return;
        }

        $users = User::query()->withoutCache()->select('id')->get();
        $details = UserDetail::factory()->count($users->count())->make();

        $detailsWithUserId = $details->map(static function(UserDetail $detail, int $index) use ($users) {
            $detail->user_id = $users->get($index % $users->count())->id;

            return $detail;
        });

        UserDetail::query()->insert($detailsWithUserId->toArray());
    }
}
