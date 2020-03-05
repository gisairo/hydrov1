<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //load the two entries required, ideally should be model factories, if this number was say 1000
        DB::table('manufacturers')->insert([
            'name' => "Muthaiga Industrials",
        ]);
        DB::table('manufacturers')->insert([
            'name' => "Other",
        ]);
    }
}
