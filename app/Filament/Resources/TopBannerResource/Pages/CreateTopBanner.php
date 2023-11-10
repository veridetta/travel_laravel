<?php

namespace App\Filament\Resources\TopBannerResource\Pages;

use App\Filament\Resources\TopBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopBanner extends CreateRecord
{
    protected static string $resource = TopBannerResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
