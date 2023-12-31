<?php

namespace App\Filament\Resources\TravelBannerResource\Pages;

use App\Filament\Resources\TravelBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;

class ListTravelBanners extends ListRecords
{
  use HasParentResource;
  protected static string $resource = TravelBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
            Actions\CreateAction::make()
                ->url(
                    fn (): string => static::getParentResource()::getUrl('travel-banners.create', [
                        'parent' => $this->parent,
                    ])
                ),
        ];
    }
}
