<?php

namespace App\Filament\Lender\Resources\Interests\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class InterestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('lender_id')
                    ->relationship('lender', 'company_name', function($query){
                        return $query->where('id', Auth::user()->lender->id);
                    })
                    ->placeholder('Select Lender')
                    ->native(false)
                    ->default(fn() => optional(Auth::user()->lender)->id)
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
