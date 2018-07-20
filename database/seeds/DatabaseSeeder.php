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
//            MenuDescriptionsTableSeeder::class,
//            MenuTableSeeder::class,
//            CitiesTableSeeder::class,
//            CountyTableSeeder::class,
//            UnitsTableSeeder::class,
//            CurrencyTableSeeder::class,
            LanguagesTableSeeder::class


        ]);

    }
}
