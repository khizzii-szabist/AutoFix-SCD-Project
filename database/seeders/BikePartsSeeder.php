<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class BikePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bikeparts = [
            [
                'name' => 'Continental GP5000 Tire',
                'description' => 'Premium road bike tire with excellent grip and puncture protection. Size 700x25c.',
                'price' => 8500,
                'stock' => 20,
                'image' => 'https://images.unsplash.com/photo-1617043786394-f977fa12eddf?w=400&h=300&fit=crop'
            ],
            [
                'name' => 'Brooks B17 Leather Saddle',
                'description' => 'Classic hand-crafted leather saddle. Comfortable for long rides, breaks in beautifully.',
                'price' => 15000,
                'stock' => 8,
                'image' => 'https://images.unsplash.com/photo-1589118949022-b4e8d0634b7f?w=400&h=300&fit=crop'
            ],
            [
                'name' => 'Shimano 105 Rear Derailleur',
                'description' => 'Reliable 11-speed rear derailleur with smooth and precise shifting performance.',
                'price' => 6500,
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1576435728678-68d0fbf94e91?w=400&h=300&fit=crop'
            ],
            [
                'name' => 'Mavic Alloy Wheelset',
                'description' => 'Durable and lightweight alloy wheelset. Perfect for training and racing. 700c clincher.',
                'price' => 35000,
                'stock' => 5,
                'image' => 'https://images.unsplash.com/photo-1617043983671-adaadcaa2460?w=400&h=300&fit=crop'
            ],
            [
                'name' => 'Aluminum Drop Handlebar',
                'description' => 'Lightweight aluminum drop handlebar. 42cm width with comfortable ergonomic design.',
                'price' => 3500,
                'stock' => 18,
                'image' => 'https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?w=400&h=300&fit=crop'
            ]
        ];

        foreach ($bikeparts as $part) {
            Product::create($part);
        }
    }
}
