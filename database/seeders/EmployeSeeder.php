<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employe')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'status' => 1,
            'date_time' => now()
        ]);

        // \App\Models\Employe::factory(10)->create();
    }
}
