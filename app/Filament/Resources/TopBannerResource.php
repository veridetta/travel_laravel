<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopBannerResource\Pages;
use App\Filament\Resources\TopBannerResource\RelationManagers;
use App\Models\TopBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopBannerResource extends Resource
{
    protected static ?string $model = TopBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Layouts';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel="Top Banners";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('active')
                    ->required()
                    ->label('Active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
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
            'index' => Pages\ListTopBanners::route('/'),
            'create' => Pages\CreateTopBanner::route('/create'),
            'edit' => Pages\EditTopBanner::route('/{record}/edit'),
        ];
    }
}
