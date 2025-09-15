<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->placeholder('John Doe')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->placeholder('john@gmail.com')
                    ->email()
                    ->required(),
                Select::make('role')
                    ->label('Role')
                    ->required()
                    ->placeholder('Select Role')
                    ->options([
                        'admin' => 'Admin',
                        'lender' => 'Lender',
                        'borrower' => 'Borrower'
                ]),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->visibleOn('create')
            ]);
    }
}
