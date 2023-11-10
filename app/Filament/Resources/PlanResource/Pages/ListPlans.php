<?php

namespace App\Filament\Resources\PlanResource\Pages;

use App\Filament\Resources\PlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Traits\HasParentResource;

class ListPlans extends ListRecords
{
  use HasParentResource;
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
            Actions\CreateAction::make()
                ->url(
                    fn (): string => static::getParentResource()::getUrl('plans.create', [
                        'parent' => $this->parent,
                    ])
                ),
        ];
    }
}
