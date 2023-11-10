<?php

namespace App\Filament\Resources\KelebihanResource\Pages;

use App\Filament\Resources\KelebihanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKelebihan extends CreateRecord
{
    protected static string $resource = KelebihanResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
