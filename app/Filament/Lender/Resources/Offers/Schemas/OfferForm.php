<?php

namespace App\Filament\Lender\Resources\Offers\Schemas;

use App\Models\Interest;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class OfferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('loan_id')
                    ->relationship('loan', 'id')
                    ->getOptionLabelFromRecordUsing(function ($record) {
                        return $record->borrower->name . " | Rp." . $record->amount . " - " . $record->tenor . " months";
                    })
                    ->placeholder('Select Loan')
                    ->label('Loan')
                    ->required()
                    ->disabled()
                    ->native(false),
                Select::make('lender_id')
                    ->relationship('lender', 'id')
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->company_name)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($set) => $set('interest_id', null))
                    ->native(false)
                    ->disabled(),

                Select::make('interest_id')
                    ->label('Interest')
                    ->options(function ($get) {
                        $lenderId = $get('lender_id');

                        if (! $lenderId) {
                            return [];
                        }

                        return Interest::where('lender_id', $lenderId)
                            ->get()
                            ->mapWithKeys(fn($interest) => [
                                $interest->id => $interest->lender->company_name
                                    . " | {$interest->tenor} months - {$interest->interest_rate}%",
                            ]);
                    })
                    ->required()
                    ->reactive()
                    ->placeholder('Select Interest')
                    ->native(false)
                    ->disabled(),

                TextInput::make('total_repayment')
                    ->label('Total Repayment')
                    ->required()
                    ->numeric()
                    ->disabled(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'accepted' => 'Accepted', 'rejected' => 'Rejected'])
                    ->native(false)
                    ->required(),
            ]);
    }
}
