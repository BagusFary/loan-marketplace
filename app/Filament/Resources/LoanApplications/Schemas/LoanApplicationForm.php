<?php

namespace App\Filament\Resources\LoanApplications\Schemas;

use Filament\Support\RawJs;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Resources\Pages\CreateRecord;

class LoanApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(function (){
                        return Auth::id();
                    }),
                TextInput::make('amount')
                    ->numeric()
                    ->label('Amount')
                    ->placeholder('Rp.500,000 - Rp.50,000,000')
                    ->prefix('Rp.')
                    ->minValue(500000)
                    ->maxValue(50000000)
                    ->required(),
                Select::make('tenor')
                    ->label('Tenor')
                    ->placeholder('Select Tenor')
                    ->options([
                        '3' => '3 Months',
                        '6' => '6 Months',
                        '12' => '12 Months'
                    ])
                    ->native(false)
                    ->required(),
                Textarea::make('purpose')
                    ->label('Purpose')
                    ->placeholder('Loan Purpose')
                    ->rows(10)
                    ->required(),
                ToggleButtons::make('status')
                    ->label('Status')
                    ->options([
                        'approve' => 'Approved',
                        'reject' => 'Rejected',
                        'pending' => 'Pending'
                    ])
                    ->colors([
                        'approve' => 'success',
                        'reject' => 'danger',
                        'pending' => 'warning'
                    ])
                    ->default('pending')
                    ->inline()
                    ->disabled(function ($livewire) {
                        return $livewire instanceof CreateRecord;
                    })
            ])
            
            ;
    }
}
