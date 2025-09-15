<?php

namespace App\Filament\Resources\Lenders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class LenderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name', function($query){
                        $query->where('role', 'lender')
                                ->whereDoesntHave('lender');
                    })
                    ->required()
                    ->placeholder('Select User Lender')
                    ->native(false)
                    ->visibleOn('create'),
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->disabled()
                    ->visibleOn(['edit', 'view']),
                TextInput::make('company_name')
                    ->required()
                    ->placeholder('Company Name'),
                TextInput::make('address')
                    ->required()
                    ->placeholder('Address'),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->placeholder('Phone Number')
            ]);
    }
}
