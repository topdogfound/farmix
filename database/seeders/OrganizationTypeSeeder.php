<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('organization.organization_types')->insertOrIgnore([
            ['name' => 'government'],
            ['name' => 'private'],
            ['name' => 'ngo'],
            ['name' => 'university'],
            ['name' => 'other'],
        ]);
    }
}
