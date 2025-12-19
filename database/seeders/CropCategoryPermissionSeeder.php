<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CropCategoryPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'create crop categories',
            'edit crop categories',
            'delete crop categories',
            'restore crop categories',
            'force delete crop categories',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
