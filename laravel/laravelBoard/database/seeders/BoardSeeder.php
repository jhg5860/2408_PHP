<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Board::factory(100)->create();
        $total =100;
        $interval =50;

        for($i=0; $i <$total; $i+= $interval) {
            Board::factory($interval)->create();
        }

    }
}
