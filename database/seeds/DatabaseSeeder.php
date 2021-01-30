<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
        DB::table('providers')->insert(
            [
                ['name' => 'BSNL', 'type' => 'broadband'],
                ['name' => 'Airtel', 'type' => 'broadband'],
                ['name' => 'Indane Energy', 'type' => 'energy'],
                ['name' => 'Tata Power', 'type' => 'energy'],


            ]
        );

        \App\Product::insert([
            ['name' => '100MB', 'provider_id' => 1,'parent_id' => 0, 'price' => 30],
            ['name' => '200MB', 'provider_id' => 1,'parent_id' => 0, 'price' => 40],
            ['name' => '300MB', 'provider_id' => 1,'parent_id' => 0, 'price' => 50],

            ['name' => '17MB', 'provider_id' => 2,'parent_id' => 0, 'price' => 25],
            ['name' => '72MB', 'provider_id' => 2,'parent_id' => 0, 'price' => 40],

            ['name' => 'Standard tariff', 'provider_id' => 3,'parent_id' => 0, 'price' => 0],
            ['name' => 'Green tariff', 'provider_id' => 3,'parent_id' => 0, 'price' => 0],
            ['name' => 'Standard tariff', 'provider_id' => 4,'parent_id' => 0, 'price' => 0],
            ['name' => 'Saver tariff', 'provider_id' => 4,'parent_id' => 0, 'price' => 0],

            ['name' => 'North', 'provider_id' => 3,'parent_id' => 6, 'price' => 54.12],
            ['name' => 'Mid', 'provider_id' => 3,'parent_id' => 6, 'price' => 56.50],
            ['name' => 'South', 'provider_id' => 3,'parent_id' => 6, 'price' => 61.92],

            ['name' => 'North', 'provider_id' => 3,'parent_id' => 7, 'price' => 64.85],
            ['name' => 'Mid', 'provider_id' => 3,'parent_id' => 7, 'price' => 68.21],
            ['name' => 'South', 'provider_id' => 3,'parent_id' => 7, 'price' => 71.66],

            ['name' => 'North', 'provider_id' => 4,'parent_id' => 8, 'price' => 51.95],
            ['name' => 'Mid', 'provider_id' => 4,'parent_id' => 8, 'price' => 52.00],
            ['name' => 'South', 'provider_id' => 4,'parent_id' => 8, 'price' => 56.62],

            ['name' => 'North', 'provider_id' => 4,'parent_id' => 9, 'price' => 42.57],
            ['name' => 'Mid', 'provider_id' => 4,'parent_id' => 9, 'price' => 45.22],
            ['name' => 'South', 'provider_id' => 4,'parent_id' => 9, 'price' => 47.67]
        ]);
    }
}
