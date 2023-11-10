<?php

namespace App\Filament\Resources\HowToAgentResource\Pages;

use App\Filament\Resources\HowToAgentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHowToAgents extends ListRecords
{
    protected static string $resource = HowToAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
