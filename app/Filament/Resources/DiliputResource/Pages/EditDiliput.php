<?php

namespace App\Filament\Resources\DiliputResource\Pages;

use App\Filament\Resources\DiliputResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiliput extends EditRecord
{
    protected static string $resource = DiliputResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
