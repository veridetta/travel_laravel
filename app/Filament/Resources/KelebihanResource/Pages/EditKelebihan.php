<?php

namespace App\Filament\Resources\KelebihanResource\Pages;

use App\Filament\Resources\KelebihanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelebihan extends EditRecord
{
    protected static string $resource = KelebihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
