<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name'    => 'Tarik Manoar',
            'address' => 'Jashore',
            'phone'   => '01945609799',

        ]);
    }
}
