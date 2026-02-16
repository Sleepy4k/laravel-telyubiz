<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (app()->isProduction()) {
            return;
        }
        if (BankAccount::query()->withoutCache()->count() > 0) {
            return;
        }

        $users = User::query()->withoutCache()->select('id')->get();
        $accounts = BankAccount::factory()->count($users->count())->make();

        $accountsWithUserId = $accounts->map(function (BankAccount $account, int $index) use ($users) {
            $account->user_id = $users->get($index % $users->count())->id;

            return $account;
        });

        BankAccount::query()->insert($accountsWithUserId->toArray());
    }
}
