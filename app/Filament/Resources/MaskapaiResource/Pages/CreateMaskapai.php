<?php

namespace App\Filament\Resources\MaskapaiResource\Pages;

use App\Filament\Resources\MaskapaiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMaskapai extends CreateRecord
{
    protected static string $resource = MaskapaiResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
