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
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            AppLanguagesTableSeeder::class,
            ListSectorsTableSeeder::class,
            AppAccountsTableSeeder::class,
            ModuleTableSeeder::class,
            PermissionsTableSeeder::class,
            MenuDescriptionsTableSeeder::class,
            MenuTableSeeder::class,
            CitiesTableSeeder::class,
            CountyTableSeeder::class,
            UnitsTableSeeder::class,
            CurrencyTableSeeder::class,
            LanguagesTableSeeder::class,
//            CompaniesTableSeeder::class,
//            TagsTableSeeder::class,
//            ProductTableSeeder::class,
//            SalesOrdersTableSeeder::class,
//            PurchaseOrderTableSeeder::class,


        ]);

    }
}
