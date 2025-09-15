<?php

namespace App\Filament\Lender\Resources\Offers;

use BackedEnum;
use App\Models\Offer;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Lender\Resources\Offers\Pages\EditOffer;
use App\Filament\Lender\Resources\Offers\Pages\ViewOffer;
use App\Filament\Lender\Resources\Offers\Pages\ListOffers;
use App\Filament\Lender\Resources\Offers\Pages\CreateOffer;
use App\Filament\Lender\Resources\Offers\Schemas\OfferForm;
use App\Filament\Lender\Resources\Offers\Tables\OffersTable;
use App\Filament\Lender\Resources\Offers\Schemas\OfferInfolist;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OfferForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OfferInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OffersTable::configure($table);
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
            'index' => ListOffers::route('/'),
            'create' => CreateOffer::route('/create'),
            'view' => ViewOffer::route('/{record}'),
            'edit' => EditOffer::route('/{record}/edit'),
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
