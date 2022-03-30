<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Support\Str;
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
        Department::create([
            'name' => 'Madichine',
        ]);
        Department::create([
            'name' => 'test',
        ]);
        Department::create([
            'name' => 'test 2',
        ]);
        Department::create([
            'name' => 'Pathlogy',
        ]);
        Department::create([
            'name' => 'Neurology',
        ]);

    }
}
