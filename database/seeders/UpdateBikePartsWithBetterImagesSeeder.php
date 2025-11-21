<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateBikePartsWithBetterImagesSeeder extends Seeder
{
    /**
     * Update all bike parts with better, accurate placeholder images
     */
    public function run(): void
    {
        // Update each product with a better image
        $updates = [
            [
                'name' => 'Shimano Road Bike Chain',
                'image' => 'https://placehold.co/400x300/1e40af/ffffff?text=Shimano+Chain&font=roboto'
            ],
            [
                'name' => 'Continental GP5000 Tire',
                'image' => 'https://placehold.co/400x300/0f172a/ffffff?text=Continental+Tire&font=roboto'
            ],
            [
                'name' => 'Brooks B17 Leather Saddle',
                'image' => 'https://placehold.co/400x300/78350f/ffffff?text=Brooks+Saddle&font=roboto'
            ],
            [
                'name' => 'Shimano 105 Rear Derailleur',
                'image' => 'https://placehold.co/400x300/dc2626/ffffff?text=105+Derailleur&font=roboto'
            ],
            [
                'name' => 'Mavic Alloy Wheelset',
                'image' => 'https://placehold.co/400x300/15803d/ffffff?text=Mavic+Wheelset&font=roboto'
            ],
            [
                'name' => 'Aluminum Drop Handlebar',
                'image' => 'https://placehold.co/400x300/ea580c/ffffff?text=Drop+Handlebar&font=roboto'
            ],
        ];

        foreach ($updates as $update) {
            $product = Product::where('name', $update['name'])->first();
            if ($product) {
                $product->update(['image' => $update['image']]);
                echo "Updated: {$update['name']}\n";
            }
        }

        echo "\nSuccessfully updated all " . count($updates) . " bike part images!\n";
    }
}
