<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        $offers = [
            [
                'id' => 4,
                'loan_id' => 15,
                'lender_id' => 2,
                'interest_id' => 1,
                'total_repayment' => 2258000.00,
                'status' => 'accepted',
                'created_at' => '2025-09-16 14:45:52',
                'updated_at' => '2025-09-16 14:48:30',
            ],
        ];

        foreach ($offers as $offer) {
            Offer::updateOrCreate(['id' => $offer['id']], $offer);
        }
    }
}
