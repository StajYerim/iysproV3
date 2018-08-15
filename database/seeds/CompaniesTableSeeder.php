<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("company_list")->truncate();
        DB::table("company_addresses")->truncate();

        factory(App\Companies::class, 5000)
            ->create()
            ->each(function ($company) {
                $company->address()->save(factory(App\Model\Companies\Address::class)->make());
            });


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
