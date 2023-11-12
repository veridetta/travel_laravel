<?php

namespace App\Filament\Resources\PesertaResource\Pages;

use App\Filament\Resources\PesertaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;
use App\Models\Peserta;
use App\Models\Room;

class ListPesertas extends ListRecords
{
  use HasParentResource;
    protected static string $resource = PesertaResource::class;

    protected function getHeaderActions(): array
    {
      $jumlah_room = Room::where('order_id',$this->parent->id)->count();
      $jumlah_peserta= Peserta::where('order_id', $this->parent->id)->count();
      $data_tersisa= $jumlah_room - $jumlah_peserta;
      if($jumlah_room > $jumlah_peserta){
        return [Actions\CreateAction::make()->label($data_tersisa." Data perlu dilengkapi")
        ->url(
            fn (): string => static::getParentResource()::getUrl('pesertas.create', [
                'parent' => $this->parent,
            ])
        )];
      }else{
        return [];
      }
    }
}
