<?php

namespace App\Filament\Resources\TravelBannerResource\Pages;

use App\Filament\Resources\TravelBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use App\Filament\Resources\TravelResource;
use App\Filament\Traits\HasParentResource;

class CreateTravelBanner extends CreateRecord
{
  use HasParentResource;
    protected static string $resource = TravelBannerResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? static::getParentResource()::getUrl('travel-banners.index', [
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
