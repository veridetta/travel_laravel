<?php

namespace App\Filament\Resources\AgentResource\Pages;

use App\Filament\Resources\AgentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;
use App\Models\Agent;

class ListAgents extends ListRecords
{
  use HasParentResource;
    protected static string $resource = AgentResource::class;

    protected static ?string $title = 'Manage Agent';
    protected function getHeaderActions(): array
    {
      if(Agent::where('user_id', $this->parent->id)->count() ==0){
        return [Actions\CreateAction::make()
        ->label('Tambah Data Agent')
        ->url(
            fn (): string => static::getParentResource()::getUrl('agents.create', [
                'parent' => $this->parent,
            ])
        )];
      }else{
        return [];
      }
    }
}
