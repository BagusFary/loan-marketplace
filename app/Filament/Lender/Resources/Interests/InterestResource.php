<?php

namespace App\Filament\Lender\Resources\Interests;

use BackedEnum;
use App\Models\Interest;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Lender\Resources\Interests\Pages\EditInterest;
use App\Filament\Lender\Resources\Interests\Pages\ViewInterest;
use App\Filament\Lender\Resources\Interests\Pages\ListInterests;
use App\Filament\Lender\Resources\Interests\Pages\CreateInterest;
use App\Filament\Lender\Resources\Interests\Schemas\InterestForm;
use App\Filament\Lender\Resources\Interests\Tables\InterestsTable;
use App\Filament\Lender\Resources\Interests\Schemas\InterestInfolist;

class InterestResource extends Resource
{
    protected static ?string $model = Interest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return InterestForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InterestInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InterestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInterests::route('/'),
            'create' => CreateInterest::route('/create'),
            'view' => ViewInterest::route('/{record}'),
            'edit' => EditInterest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $lender = Auth::user()->lender;
        $query->where('lender_id', $lender->id);

        return $query;
    }
}
