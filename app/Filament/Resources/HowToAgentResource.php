<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HowToAgentResource\Pages;
use App\Filament\Resources\HowToAgentResource\RelationManagers;
use App\Models\HowToAgent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HowToAgentResource extends Resource
{
    protected static ?string $model = HowToAgent::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationGroup = 'Static Contents';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel="Cara Gabung Agent";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->visibility('public')
                    ->directory('images')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
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
            'index' => Pages\ListHowToAgents::route('/'),
            'create' => Pages\CreateHowToAgent::route('/create'),
            'edit' => Pages\EditHowToAgent::route('/{record}/edit'),
        ];
    }
}
