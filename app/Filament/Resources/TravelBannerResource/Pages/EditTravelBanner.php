<?php

namespace App\Filament\Resources\TravelBannerResource\Pages;

use App\Filament\Resources\TravelBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTravelBanner extends EditRecord
{
    protected static string $resource = TravelBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
