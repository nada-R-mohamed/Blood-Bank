<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('cities')->insert([
            ['name' => 'Nasr City', 'governorate_id' => 1],
            ['name' => 'Heliopolis', 'governorate_id' => 1],
            ['name' => '6th of October', 'governorate_id' => 2],
            ['name' => 'Dokki', 'governorate_id' => 2],
            ['name' => 'Stanley', 'governorate_id' => 3],
            ['name' => 'Smouha', 'governorate_id' => 3],
            ['name' => 'Mansoura', 'governorate_id' => 4],
            ['name' => 'Hurghada', 'governorate_id' => 5],
            ['name' => 'Damanhour', 'governorate_id' => 6],
            ['name' => 'Fayoum City', 'governorate_id' => 7],
        ]);
    }
}
