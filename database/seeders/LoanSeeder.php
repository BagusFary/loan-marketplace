<?php

namespace Database\Seeders;

use App\Models\LoanApplication;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loans = [
            [
                'id' => 3,
                'user_id' => 1,
                'amount' => 15000000.00,
                'tenor' => 12,
                'purpose' => "Pinjaman jadi 15 juta Edited\n\nTenor ganti 12 Bulan\n\nStatus Rejected",
                'created_at' => '2025-09-13 13:35:45',
                'updated_at' => '2025-09-13 13:49:31',
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'amount' => 7000000.00,
                'tenor' => 12,
                'purpose' => 'Pinjaman 7 Juta',
                'created_at' => '2025-09-13 13:46:25',
                'updated_at' => '2025-09-13 15:39:50',
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'amount' => 40000000.00,
                'tenor' => 12,
                'purpose' => 'Pinjaman 40 Juta',
                'created_at' => '2025-09-13 13:47:47',
                'updated_at' => '2025-09-13 15:40:06',
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'amount' => 7000000.00,
                'tenor' => 3,
                'purpose' => 'Pinjaman 7 juta',
                'created_at' => '2025-09-13 15:17:37',
                'updated_at' => '2025-09-13 15:17:37',
            ],
            [
                'id' => 15,
                'user_id' => 8,
                'amount' => 2000000.00,
                'tenor' => 3,
                'purpose' => 'Membuka usaha',
                'created_at' => '2025-09-16 14:44:38',
                'updated_at' => '2025-09-16 14:44:38',
            ],
        ];

        foreach ($loans as $loan) {
            LoanApplication::updateOrCreate(['id' => $loan['id']], $loan);
        }
    }
}
