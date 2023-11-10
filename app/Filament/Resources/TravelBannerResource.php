<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TravelBannerResource\Pages;
use App\Filament\Resources\TravelBannerResource\RelationManagers;
use App\Models\TravelBanner;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class TravelBannerResource extends Resource
{
    protected static ?string $model = TravelBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;

    public static string $parentResource = TravelResource::class;

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->title;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\FileUpload::make('path')
              ->image()
              ->required()
              ->label('Image')
              ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              Tables\Columns\ImageColumn::make('path'),
              Tables\Columns\TextColumn::make('created_at')
                  ->searchable()
                  ->sortable(),

            ])
            ->filters([

            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\EditAction::make()
                    ->url(
                        fn (Pages\ListTravelBanners $livewire, Model $record): string => static::$parentResource::getUrl('travel-banners.edit', [
                            'record' => $record,
                            'parent' => $livewire->parent,
                        ])
                    ),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /*
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTravelBanners::route('/'),
            'create' => Pages\CreateTravelBanner::route('/create'),
            'edit' => Pages\EditTravelBanner::route('/{record}/edit'),
        ];
    }
    */
}
