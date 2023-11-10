<?php

namespace App\Filament\Resources\KelebihanResource\Pages;

use App\Filament\Resources\KelebihanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelebihans extends ListRecords
{
    protected static string $resource = KelebihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
