<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Discount::create([
            'name' => 'Bukber',
            'description' => 'Discount Bukber',
            'type' => 'percentage',
            'value' => 20,
            'status' => 'active',
            'expired_date' => '2025-01-31'
        ]);

        \App\Models\Discount::create([
            'name' => 'August',
            'description' => 'Discount August',
            'type' => 'percentage',
            'value' => 10,
            'status' => 'active',
            'expired_date' => '2025-01-07'
        ]);

        \App\Models\Discount::create([
            'name' => 'New Year',
            'description' => 'Discount New Year',
            'type' => 'percentage',
            'value' => 15,
            'status' => 'active',
            'expired_date' => '2025-12-31'
        ]);
    }
}