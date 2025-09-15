<?php

namespace App\Filament\Lender\Resources\Interests\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Components\Flex;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Tables\Filters\SelectFilter;

class InterestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lender.company_name')
                    ->searchable(),
                TextColumn::make('tenor')
                    ->label('Tenor')
                    ->formatStateUsing(function ($state){
                        return $state . ' months';
                    }),
                TextColumn::make('interest_rate')
                    ->label('Interest Rate')
                    ->numeric()
                    ->formatStateUsing(fn($state) => number_format($state, 1) . ' %')

            ])
            ->searchPlaceholder('Search Lender')
            ->filters([
                SelectFilter::make('tenor')
                    ->options([
                        3 => '3 Months',
                        6 => '6 Months',
                        12 => '12 Months'
                    ])
                    ->placeholder('Select Tenor')
                    ->native(false),
                Filter::make('interest_rate')
                    ->label('Interest Rate')
                    ->schema([
                        Flex::make([
                            Section::make([
                                TextInput::make('interest_min')
                                ->numeric()
                                ->minValue(0)
                                ->label('Interest Min')
                                ->placeholder('Interest Minimum')
                                ->suffix('%'),
                                TextInput::make('interest_max')
                                ->numeric()
                                ->maxValue(50000000)
                                ->label('Interest Max')
                                ->placeholder('Interest Maximum')
                                ->suffix('%'),
                            ]),
                        ])
                    ])
                    ->query(function ($query, $data) {
                        return $query
                        ->when($data['interest_min'], function($query, $interest) {
                            return $query->where('interest_rate', '>=', $interest);
                        })
                        ->when($data['interest_max'], function($query, $interest){
                            return $query->where('interest_rate', '<=', $interest);
                        });
                    })
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
