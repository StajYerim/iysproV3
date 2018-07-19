<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AppAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_accounts')->delete();

        DB::table('app_accounts')->insert([
            [
              'id' => 1,
              'company_name' => 'One Company Ltd.',
              'sector_id' => 1,
              'owner_id' => 2,
              'modules'=>'[1,2,5,11,17,23,27]',
              'expiry_date' => \Carbon\Carbon::now()->addMonth(),
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $account = \App\Account::find(1);
        $account->units()->attach(1);
        $account->units()->attach(20);

        $user = \App\User::find(2);
        $user->account_id = 1;
        $user->save();

        $user = \App\User::find(3);
        $user->account_id = 1;
        $user->save();
    }
}