<?php

namespace App\Filament\Lender\Resources\Offers\Pages;

use App\Filament\Lender\Resources\Offers\OfferResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOffer extends ViewRecord
{
    protected static string $resource = OfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
