<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
//            RolesTableSeeder::class,
//            AppLanguagesTableSeeder::class,
//            UsersTableSeeder::class,
//            ListSectorsTableSeeder::class,
//            AppAccountsTableSeeder::class,
//            ModuleTableSeeder::class,
//            PermissionsTableSeeder::class,
//            MenuTableSeeder::class,
//            MenuDescriptionsTableSeeder::class,
            CitiesTableSeeder::class,
            CountyTableSeeder::class,
//        factory(\App\Model\Companies\Address::class,500)->create(),
        UnitsTableSeeder::class,
        CurrencyTableSeeder::class,


        ]);

    }
}
