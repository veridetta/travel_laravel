<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelebihanResource\Pages;
use App\Filament\Resources\KelebihanResource\RelationManagers;
use App\Models\Kelebihan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelebihanResource extends Resource
{
    protected static ?string $model = Kelebihan::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';
    protected static ?string $navigationGroup = 'Static Contents';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel="Kelebihan Website";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->limit(50),
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
            'index' => Pages\ListKelebihans::route('/'),
            'create' => Pages\CreateKelebihan::route('/create'),
            'edit' => Pages\EditKelebihan::route('/{record}/edit'),
        ];
    }
}
