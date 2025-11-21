<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class FixBikePartsImagesSeeder extends Seeder
{
    /**
     * Fix product images with reliable placeholder images
     */
    public function run(): void
    {
        // Update each product with reliable image placeholder
        $updates = [
            [
                'name' => 'Shimano Road Bike Chain',
                'image' => 'https://placehold.co/400x300/4f46e5/white?text=Bike+Chain'
            ],
            [
                'name' => 'Continental GP5000 Tire',
                'image' => 'https://placehold.co/400x300/7c3aed/white?text=Bike+Tire'
            ],
            [
                'name' => 'Brooks B17 Leather Saddle',
                'image' => 'https://placehold.co/400x300/ec4899/white?text=Bike+Saddle'
            ],
            [
                'name' => 'Shimano 105 Rear Derailleur',
                'image' => 'https://placehold.co/400x300/3b82f6/white?text=Derailleur'
            ],
            [
                'name' => 'Mavic Alloy Wheelset',
                'image' => 'https://placehold.co/400x300/10b981/white?text=Wheelset'
            ],
            [
                'name' => 'Aluminum Drop Handlebar',
                'image' => 'https://placehold.co/400x300/f59e0b/white?text=Handlebar'
            ],
        ];

        foreach ($updates as $update) {
            Product::where('name', $update['name'])->update(['image' => $update['image']]);
        }

        echo "Updated " . count($updates) . " product images successfully!\n";
    }
}
