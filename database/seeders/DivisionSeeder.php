<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisions;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Divisions::create(['name' => 'Information Technology', 'status' => 'active']);
        Divisions::create(['name' => 'Engineering', 'status' => 'active']);
        Divisions::create(['name' => 'Teknisi Listrik', 'status' => 'active']);
    }
}
