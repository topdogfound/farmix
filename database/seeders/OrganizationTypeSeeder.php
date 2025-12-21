<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationType;

class OrganizationTypeSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'government',
            'private',
            'ngo',
            'university',
            'other',
        ] as $type) {
            OrganizationType::firstOrCreate([
                'name' => $type,
            ]);
        }
    }
}
