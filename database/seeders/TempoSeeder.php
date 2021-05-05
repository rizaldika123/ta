<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tempos')->insert(['bulan' => 3]);
        DB::table('tempos')->insert(['bulan' => 6]);
        DB::table('tempos')->insert(['bulan' => 12]);
        DB::table('tempos')->insert(['bulan' => 24]);
    }
}
