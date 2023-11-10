<?php

namespace App\Filament\Resources\DiliputResource\Pages;

use App\Filament\Resources\DiliputResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDiliput extends CreateRecord
{
    protected static string $resource = DiliputResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
