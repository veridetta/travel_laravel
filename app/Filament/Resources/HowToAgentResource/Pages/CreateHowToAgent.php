<?php

namespace App\Filament\Resources\HowToAgentResource\Pages;

use App\Filament\Resources\HowToAgentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHowToAgent extends CreateRecord
{
    protected static string $resource = HowToAgentResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
