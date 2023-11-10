<?php

namespace App\Filament\Resources\TopBannerResource\Pages;

use App\Filament\Resources\TopBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopBanner extends EditRecord
{
    protected static string $resource = TopBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
