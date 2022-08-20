<?php

namespace Database\Seeders;

use App\Models\Categor;
use Illuminate\Database\Seeder;

class CategorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categor::factory()
            ->count(5)
            ->create();
    }
}
