<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiayaAdministrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biaya_administrasis')->insert(['nominal' => 1]);
        DB::table('biaya_administrasis')->insert(['nominal' => 2]);
        DB::table('biaya_administrasis')->insert(['nominal' => 3]);
    }
}
