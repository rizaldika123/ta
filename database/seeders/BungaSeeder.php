<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BungaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bungas')->insert(['nominal'=>2]);
        DB::table('bungas')->insert(['nominal'=>3]);
        DB::table('bungas')->insert(['nominal'=>4]);
        DB::table('bungas')->insert(['nominal'=>5]);
    }
}
