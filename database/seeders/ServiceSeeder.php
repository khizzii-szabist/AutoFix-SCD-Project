<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Maintenance & Repair Services',
                'price' => 5000,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEYwYNwJysJlrHMbg-vuJdpLAUheWUzw7eqpwYUy4ULw4oBRITBgHdjtAAyE55AZUWEWs&usqp=CAU'
            ],
            [
                'name' => 'Customization',
                'price' => 1500,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmZQ224X5MBBPIPvRNopxGAjiM99w28_q2nQ&s'
            ],
            [
                'name' => 'Cleaning & Detailing Services',
                'price' => 2000,
                'image' => 'https://t4.ftcdn.net/jpg/03/75/47/61/360_F_375476190_A6SPPQNxgcv5aytI7aXbew95eQWflC6m.jpg'
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
