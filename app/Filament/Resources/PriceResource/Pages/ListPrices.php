<?php

namespace App\Filament\Resources\PriceResource\Pages;

use App\Filament\Resources\PriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;

class ListPrices extends ListRecords
{
  use HasParentResource;
    protected static string $resource = PriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Asctions\CreateAction::make(),
            Actions\CreateAction::make()
                ->url(
                    fn (): string => static::getParentResource()::getUrl('prices.create', [
                        'parent' => $this->parent,
                    ])
                ),
        ];
    }
}
