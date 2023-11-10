<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TravelResource\Pages;
use App\Filament\Resources\TravelResource\RelationManagers;
use App\Models\Travel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TravelResource extends Resource
{
    protected static ?string $model = Travel::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';
    protected static ?string $navigationGroup = 'Data & Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel="Travel Package";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('departure')
                    ->required()
                    ->label('Tanggal Pemberangkatan'),
                Forms\Components\TextInput::make('flight')
                    ->required()
                    ->label('Destinasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('from')
                    ->label('Dari')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('duration')
                    ->label('Durasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maskapai')
                    ->label('Maskapai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('include')
                    ->label('Include (Fasilitas)')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('outclude')
                    ->label('Outclude (Fasilitas)')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('departure'),
                Tables\Columns\TextColumn::make('flight')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maskapai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('include')
                    ->searchable(),
                Tables\Columns\TextColumn::make('outclude')
                    ->searchable(),
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
            'index' => Pages\ListTravel::route('/'),
            'create' => Pages\CreateTravel::route('/create'),
            'edit' => Pages\EditTravel::route('/{record}/edit'),
        ];
    }
}
