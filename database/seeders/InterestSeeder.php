<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            [
                'id' => 1,
                'lender_id' => 2,
                'tenor' => 3,
                'interest_rate' => 12.90,
                'created_at' => '2025-09-15 04:50:39',
                'updated_at' => '2025-09-15 04:50:39',
            ],
            [
                'id' => 2,
                'lender_id' => 2,
                'tenor' => 6,
                'interest_rate' => 20.50,
                'created_at' => '2025-09-15 04:56:36',
                'updated_at' => '2025-09-15 04:56:36',
            ],
            [
                'id' => 4,
                'lender_id' => 5,
                'tenor' => 3,
                'interest_rate' => 5.50,
                'created_at' => '2025-09-15 04:59:54',
                'updated_at' => '2025-09-15 04:59:54',
            ],
            [
                'id' => 5,
                'lender_id' => 5,
                'tenor' => 3,
                'interest_rate' => 7.80,
                'created_at' => '2025-09-15 05:00:11',
                'updated_at' => '2025-09-15 05:53:21',
            ],
            [
                'id' => 6,
                'lender_id' => 2,
                'tenor' => 12,
                'interest_rate' => 7.90,
                'created_at' => '2025-09-15 05:53:48',
                'updated_at' => '2025-09-15 05:53:48',
            ],
            [
                'id' => 7,
                'lender_id' => 5,
                'tenor' => 12,
                'interest_rate' => 35.00,
                'created_at' => '2025-09-15 17:23:16',
                'updated_at' => '2025-09-15 17:23:16',
            ],
        ];

        foreach ($interests as $interest) {
            Interest::updateOrCreate(['id' => $interest['id']], $interest);
        }
    }
}
