<?php

namespace App\Filament\Resources\DiliputResource\Pages;

use App\Filament\Resources\DiliputResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiliputs extends ListRecords
{
    protected static string $resource = DiliputResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
