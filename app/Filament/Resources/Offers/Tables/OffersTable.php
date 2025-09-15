<?php

namespace App\Filament\Resources\Offers\Tables;

use App\Models\Interest;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Schemas\Components\Flex;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Tables\Filters\SelectFilter;

class OffersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('loan.borrower.name')
                    ->searchable()
                    ->label('Borrower'),
                TextColumn::make('lender.company_name')
                    ->searchable(),
                TextColumn::make('interest_id')
                    ->label('Interest Rate')
                    ->formatStateUsing(function ($state, $record){
                        return $record->interest->tenor . " months" . " - " . $record->interest->interest_rate . "%" ;
                    }),
                TextColumn::make('total_repayment')
                    ->label('Total Repayment')
                    ->currency('IDR'),
                TextColumn::make('status')
                    ->badge()
                    ->color(function($state){
                        return match($state){
                            'pending' => 'warning',
                            'accepted' => 'success',
                            'rejected' => 'danger'
                        };
                    }),
            ])
            ->filters([
                SelectFilter::make('loan_id')
                    ->label('Borrower')
                    ->placeholder('Select Borrower')
                    ->relationship('loan.borrower', 'name')
                    ->native(false),
                SelectFilter::make('lender_id')
                    ->label('Lender')
                    ->placeholder('Select Lender')
                    ->relationship('lender', 'company_name')
                    ->native(false),
                SelectFilter::make('interest_id')
                    ->label('Interest')
                    ->options(function () {
                        return Interest::with('lender')
                            ->get('*')
                            ->mapWithKeys(fn($interest) => [
                                $interest->id => $interest->lender->company_name
                                    . " | {$interest->tenor} months - {$interest->interest_rate}%",
                            ]);
                    })
                    ->placeholder('Select Interest')
                    ->native(false),
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ])
                    ->placeholder('Select Status')
                    ->native(false),
                Filter::make('total_repayment')
                    ->label('Total Repayment')
                    ->schema([
                        Flex::make([
                            Section::make([
                                TextInput::make('repayment_min')
                                ->numeric()
                                ->minValue(0)
                                ->label('Repayment Min')
                                ->placeholder('Repayment Minimum')
                                ->prefix('Rp.'),
                                TextInput::make('repayment_max')
                                ->numeric()
                                ->maxValue(50000000)
                                ->label('Repayment Max')
                                ->placeholder('Repayment Maximum')
                                ->prefix('Rp.'),
                            ]),
                        ])
                    ])
                    ->query(function ($query, $data) {
                        return $query
                        ->when($data['repayment_min'], function($query, $repayment) {
                            return $query->where('total_repayment', '>=', $repayment);
                        })
                        ->when($data['repayment_max'], function($query, $repayment){
                            return $query->where('total_repayment', '<=', $repayment);
                        });
                    })
            ])
            ->searchPlaceholder('Search Borrower/Lender')
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
