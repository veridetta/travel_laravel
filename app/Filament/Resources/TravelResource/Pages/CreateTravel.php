<?php

namespace App\Filament\Resources\TravelResource\Pages;

use App\Filament\Resources\TravelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTravel extends CreateRecord
{
    protected static string $resource = TravelResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
