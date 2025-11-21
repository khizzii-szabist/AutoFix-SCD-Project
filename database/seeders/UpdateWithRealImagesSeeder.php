<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateWithRealImagesSeeder extends Seeder
{
    /**
     * Update all bike parts with real AI-generated images
     */
    public function run(): void
    {
        $updates = [
            ['name' => 'Shimano Road Bike Chain', 'image' => 'shimano_chain.png'],
            ['name' => 'Continental GP5000 Tire', 'image' => 'continental_tire.png'],
            ['name' => 'Brooks B17 Leather Saddle', 'image' => 'brooks_saddle.png'],
            ['name' => 'Shimano 105 Rear Derailleur', 'image' => 'shimano_derailleur.png'],
            ['name' => 'Mavic Alloy Wheelset', 'image' => 'mavic_wheelset.png'],
            ['name' => 'Aluminum Drop Handlebar', 'image' => 'drop_handlebar.png'],
        ];

        foreach ($updates as $update) {
            Product::where('name', $update['name'])->update(['image' => $update['image']]);
            echo "Updated {$update['name']} with {$update['image']}\n";
        }

        echo "\n✅ Successfully updated all 6 products with real images!\n";
    }
}
