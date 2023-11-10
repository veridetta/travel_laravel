<?php

namespace App\Filament\Resources\PriceResource\Pages;

use App\Filament\Resources\PriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;
use App\Models\Price;

class ListPrices extends ListRecords
{
  use HasParentResource;
    protected static string $resource = PriceResource::class;

    protected function getHeaderActions(): array
    {
      if(Price::where('travel_id', $this->parent->id)->count() ==0){
        return [Actions\CreateAction::make()
        ->url(
            fn (): string => static::getParentResource()::getUrl('prices.create', [
                'parent' => $this->parent,
            ])
        )];
      }else{
        return [];
      }
    }
}
