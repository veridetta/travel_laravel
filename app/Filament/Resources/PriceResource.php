<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceResource\Pages;
use App\Filament\Resources\PriceResource\RelationManagers;
use App\Models\Price;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class PriceResource extends Resource
{
    protected static ?string $model = Price::class;
    public static string $parentResource = TravelResource::class;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->title;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price_dewasa')
                    ->required()
                    ->label('Harga Dewasa')
                    ->currencyMask(thousandSeparator: '.',decimalSeparator: ',',precision: 2),
                Forms\Components\TextInput::make('price_anak')
                    ->required()
                    ->label('Harga Anak')
                    ->currencyMask(thousandSeparator: '.',decimalSeparator: ',',precision: 2),
                Forms\Components\TextInput::make('price_bayi')
                    ->required()
                    ->label('Harga Bayi')
                    ->currencyMask(thousandSeparator: '.',decimalSeparator: ',',precision: 2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('price_dewasa')
                    ->currency('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_anak')
                    ->currency('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_bayi')
                    ->currency('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                Tables\Actions\EditAction::make()
                    ->url(
                        fn (Pages\ListPrices $livewire, Model $record): string => static::$parentResource::getUrl('prices.edit', [
                            'record' => $record,
                            'parent' => $livewire->parent,
                        ])
                    ),
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
            'index' => Pages\ListPrices::route('/'),
            'create' => Pages\CreatePrice::route('/create'),
            'edit' => Pages\EditPrice::route('/{record}/edit'),
        ];
    }
    */

}
