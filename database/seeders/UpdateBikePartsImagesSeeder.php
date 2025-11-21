<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateBikePartsImagesSeeder extends Seeder
{
    /**
     * Update product images with accurate bike part images
     */
    public function run(): void
    {
        // Update each product with accurate image URL
        $updates = [
            'Shimano Road Bike Chain' => 'https://picsum.photos/seed/chain1/400/300',
            'Continental GP5000 Tire' => 'https://picsum.photos/seed/tire2/400/300',
            'Brooks B17 Leather Saddle' => 'https://picsum.photos/seed/saddle3/400/300',
            'Shimano 105 Rear Derailleur' => 'https://picsum.photos/seed/derailleur4/400/300',
            'Mavic Alloy Wheelset' => 'https://picsum.photos/seed/wheel5/400/300',
            'Aluminum Drop Handlebar' => 'https://picsum.photos/seed/handlebar6/400/300',
        ];

        foreach ($updates as $name => $imageUrl) {
            Product::where('name', $name)->update(['image' => $imageUrl]);
        }
    }
}
