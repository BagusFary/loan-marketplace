<?php

namespace App\Filament\Resources\Offers\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class OfferInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('loan')
                    ->label('Loan')
                    ->formatStateUsing(
                        fn($record) =>
                        $record->loan
                            ? $record->loan->borrower->name . " | Rp." . number_format($record->loan->amount, 0, ',', '.') . " - {$record->loan->tenor} months"
                            : '-'
                    ),

                TextEntry::make('lender.company_name')
                    ->label('Lender'),

                TextEntry::make('interest')
                    ->label('Interest')
                    ->formatStateUsing(
                        fn($record) =>
                        $record->interest
                            ? $record->interest->lender->company_name . " | {$record->interest->tenor} months - {$record->interest->interest_rate}%"
                            : '-'
                    ),
                TextEntry::make('total_repayment')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge()
                    ->color(function ($state) {
                        return match ($state) {
                            'pending' => 'warning',
                            'accepted' => 'success',
                            'rejected' => 'danger'
                        };
                    }),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
