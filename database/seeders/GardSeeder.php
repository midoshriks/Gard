<?php

namespace Database\Seeders;

use App\Models\Gard;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test_row = Gard::create([
            "A" => Carbon::now(), // date
            "B" => '0', // first_term
            // "C" => '', // come_in
            // "D" => '', // Convert_from
            // "E" => '', // Convert_to
            // "F" => '', // harmony
            // "G" => '', // sales
            "H" => '0', // residual
            // "I" => '', // last_term
            "J" => '0', // disability
        ]);
    }
}
