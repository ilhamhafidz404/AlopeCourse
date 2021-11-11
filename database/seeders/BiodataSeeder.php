<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Seeder;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biodata::insert([
            ['user_id' => 1],
            ['user_id' => 2],
            ['user_id' => 3],
            ['user_id' => 4],
        ]);
    }
}
