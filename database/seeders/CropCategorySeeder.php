<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\CropCategory;

class CropCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cereals & Grains',
                'description' => 'Crops cultivated primarily for their edible grains.',
            ],
            [
                'name' => 'Pulses & Legumes',
                'description' => 'Protein-rich crops like lentils, beans, and peas.',
            ],
            [
                'name' => 'Oilseed Crops',
                'description' => 'Crops grown mainly for oil extraction.',
            ],
            [
                'name' => 'Vegetable Crops',
                'description' => 'Crops grown for edible vegetables.',
            ],
            [
                'name' => 'Fruit Crops',
                'description' => 'Crops producing edible fruits.',
            ],
            [
                'name' => 'Spice Crops',
                'description' => 'Crops used for flavoring, seasoning, and aroma.',
            ],
            [
                'name' => 'Fibre Crops',
                'description' => 'Crops grown for fibre production like cotton and jute.',
            ],
            [
                'name' => 'Sugar Crops',
                'description' => 'Crops cultivated for sugar extraction.',
            ],
            [
                'name' => 'Plantation Crops',
                'description' => 'Commercial crops grown on large estates.',
            ],
            [
                'name' => 'Medicinal & Aromatic Crops',
                'description' => 'Crops used in pharmaceuticals and essential oils.',
            ],
        ];

        foreach ($categories as $category) {
            CropCategory::firstOrCreate(
                ['name' => $category['name']],
                [
                    'slug' => Str::slug($category['name']),
                    'description' => $category['description'],
                ]
            );
        }
    }
}
