<?php

namespace App\Filament\Resources\RoomResource\Pages;

use App\Filament\Resources\RoomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;
use App\Models\Room;

class ListRooms extends ListRecords
{
  use HasParentResource;
    protected static string $resource = RoomResource::class;

    protected function getHeaderActions(): array
    {
      if(Room::where('order_id', $this->parent->id)->count() ==0){
        return [Actions\CreateAction::make()
        ->url(
            fn (): string => static::getParentResource()::getUrl('rooms.create', [
                'parent' => $this->parent,
            ])
        )];
      }else{
        return [];
      }
    }
}
