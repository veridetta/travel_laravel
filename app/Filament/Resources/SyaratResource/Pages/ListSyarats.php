<?php

namespace App\Filament\Resources\SyaratResource\Pages;

use App\Filament\Resources\SyaratResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;
use App\Models\Syarat;

class ListSyarats extends ListRecords
{
  use HasParentResource;
    protected static string $resource = SyaratResource::class;

    protected function getHeaderActions(): array
    {
      if(Syarat::where('travel_id', $this->parent->id)->count() ==0){
        return [Actions\CreateAction::make()
        ->url(
            fn (): string => static::getParentResource()::getUrl('syarats.create', [
                'parent' => $this->parent,
            ])
        )];
      }else{
        return [];
      }
    }
}
