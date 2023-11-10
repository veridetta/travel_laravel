<?php

namespace App\Filament\Resources\SyaratResource\Pages;

use App\Filament\Resources\SyaratResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Traits\HasParentResource;

class CreateSyarat extends CreateRecord
{
  use HasParentResource;
    protected static string $resource = SyaratResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? static::getParentResource()::getUrl('syarats.index', [
            'parent' => $this->parent,
        ]);
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set the parent relationship key to the parent resource's ID.
        $data[$this->getParentRelationshipKey()] = $this->parent->id;

        return $data;
    }
}
