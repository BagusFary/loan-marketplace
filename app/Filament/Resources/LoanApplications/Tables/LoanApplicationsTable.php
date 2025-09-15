<?php

namespace App\Filament\Resources\LoanApplications\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\Filter;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Schemas\Components\Flex;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\ForceDeleteBulkAction;


class LoanApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('borrower.name')
                    ->label('Borrower'),
                TextColumn::make('amount')
                    ->currency('IDR'),
                TextColumn::make('tenor')
                    ->label('Tenor')
                    ->formatStateUsing(function ($state){
                        return $state . ' months';
                    }),
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->label('Borrower')
                    ->placeholder('Select Borrower')
                    ->relationship('borrower', 'name')
                    ->native(false),
                SelectFilter::make('tenor')
                    ->label('Tenor')
                    ->placeholder('Select Tenor')
                    ->options([
                        3 => '3 Months',
                        6 => '6 Months',
                        12 => '12 Months'
                    ])
                    ->native(false),
                Filter::make('amount')
                    ->label('Amount')
                    ->schema([
                        Flex::make([
                            Section::make([
                                TextInput::make('amount_min')
                                ->numeric()
                                ->minValue(0)
                                ->label('Amount Min')
                                ->placeholder('Amount Minimum')
                                ->prefix('Rp.'),
                                TextInput::make('amount_max')
                                ->numeric()
                                ->maxValue(50000000)
                                ->label('Amount Max')
                                ->placeholder('Amount Maximum')
                                ->prefix('Rp.'),
                            ]),
                        ])
                    ])
                    ->query(function ($query, $data) {
                        return $query
                        ->when($data['amount_min'], function($query, $amount) {
                            return $query->where('amount', '>=', $amount);
                        })
                        ->when($data['amount_max'], function($query, $amount){
                            return $query->where('amount', '<=', $amount);
                        });
                    })

            ])
            ->filtersFormColumns(2)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
