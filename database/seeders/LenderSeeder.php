<?php

namespace Database\Seeders;

use App\Models\Lender;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        $lenders = [
            [
                'id' => 2,
                'user_id' => 5,
                'company_name' => 'Smith York Traders',
                'address' => 'Nulla neque irure do',
                'phone' => '0896865577783',
            ],
            [
                'id' => 5,
                'user_id' => 7,
                'company_name' => 'GM Company',
                'address' => 'Addres Gillian Moren',
                'phone' => '089678557332',
            ],
        ];

        foreach ($lenders as $lender) {
            Lender::updateOrCreate(['id' => $lender['id']], $lender);
        }
    }
}
