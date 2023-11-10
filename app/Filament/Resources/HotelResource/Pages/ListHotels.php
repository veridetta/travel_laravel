<?php

namespace App\Filament\Resources\HotelResource\Pages;

use App\Filament\Resources\HotelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;

class ListHotels extends ListRecords
{
  use HasParentResource;
    protected static string $resource = HotelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
            Actions\CreateAction::make()
                ->url(
                    fn (): string => static::getParentResource()::getUrl('hotels.create', [
                        'parent' => $this->parent,
                    ])
                ),
        ];
    }
}
