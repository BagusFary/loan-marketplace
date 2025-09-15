<?php

namespace App\Filament\Resources\Interests\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class InterestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('lender_id')
                    ->relationship('lender', 'company_name')
                    ->placeholder('Select Lender')
                    ->native(false)
                    ->required(),
                Select::make('tenor')
                    ->options([
                        3 => '3 Months',
                        6 => '6 Months',
                        12 => '12 Months'
                    ])
                    ->placeholder('Select Tenor')
                    ->required()
                    ->native(false),
                TextInput::make('interest_rate')
                    ->label('Interest Rate')
                    ->numeric()
                    ->rule('decimal:0,2')
                    ->suffix('%')
                    ->minValue(0)
                    ->placeholder('example: 12.5')
                    ->required()
            ]);
    }
}
