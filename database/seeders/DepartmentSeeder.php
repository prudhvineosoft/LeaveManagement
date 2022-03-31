<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name' => 'Automobile Engineering'],
            ['name' => 'mechanical Engineering'],
            ['name' => 'Robotics Engineering'],
            ['name' => 'Civil Engineering'],
            ['name' => 'Electrical and Electronics Engineering'],
            ['name' => 'Computer Science and Engineering'],
            ['name' => 'Marine Engineering'],
        ]);
    }
}
