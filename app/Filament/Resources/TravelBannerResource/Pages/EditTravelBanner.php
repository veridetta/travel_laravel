<?php

namespace App\Filament\Resources\TravelBannerResource\Pages;



use App\Filament\Resources\TravelBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Traits\HasParentResource;

class EditTravelBanner extends EditRecord
{
  use HasParentResource;
    protected static string $resource = TravelBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? static::getParentResource()::getUrl('travel-banners.index', [
            'parent' => $this->parent,
        ]);
    }

    protected function configureDeleteAction(Actions\DeleteAction $action): void
    {
        $resource = static::getResource();

        $action->authorize($resource::canDelete($this->getRecord()))
            ->successRedirectUrl(static::getParentResource()::getUrl('travel-banners.index', [
                'parent' => $this->parent,
            ]));
    }
}
