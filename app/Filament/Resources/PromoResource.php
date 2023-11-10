<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromoResource\Pages;
use App\Filament\Resources\PromoResource\RelationManagers;
use App\Models\Promo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromoResource extends Resource
{
    protected static ?string $model = Promo::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Financial';
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationLabel="Promo & Coupon Codes";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('travel_id')
                    ->numeric(),
                Forms\Components\Toggle::make('isAll')
                    ->required(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('isPercent')
                    ->required(),
                Forms\Components\TextInput::make('discount')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('start')
                    ->required(),
                Forms\Components\DatePicker::make('end')
                    ->required(),
                Forms\Components\TextInput::make('max')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('travel_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('isAll')
                    ->boolean(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\IconColumn::make('isPercent')
                    ->boolean(),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max')
                    ->numeric()
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
                Tables\Actions\EditAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromos::route('/'),
            'create' => Pages\CreatePromo::route('/create'),
            'edit' => Pages\EditPromo::route('/{record}/edit'),
        ];
    }
}
