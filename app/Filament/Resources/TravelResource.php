<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceResource\Pages\CreatePrice;
use App\Filament\Resources\PriceResource\Pages\EditPrice;
use App\Filament\Resources\PriceResource\Pages\ListPrices;
use App\Filament\Resources\TravelBannerResource\Pages\CreateTravelBanner;
use App\Filament\Resources\TravelBannerResource\Pages\EditTravelBanner;
use App\Filament\Resources\TravelBannerResource\Pages\ListTravelBanners;
use App\Filament\Resources\TravelResource\Pages;
use App\Filament\Resources\TravelResource\RelationManagers;
use App\Models\Maskapai;
use App\Models\Travel;
use App\Models\TravelBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;

class TravelResource extends Resource
{
    protected static ?string $model = Travel::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';
    protected static ?string $navigationGroup = 'Data & Management';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel="Travel Package";

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->name;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('seat')
                    ->required()
                    ->label('Jumlah Seat')
                    ->maxLength(255)
                    ->type('number'),
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
                Forms\Components\Select::make('maskapai')
                    ->label('Pilih Maskapai')
                    ->options(Maskapai::all()->pluck('name', 'id'))
                    ->searchable()
                    ->columnSpanFull()
                    ->required(),
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
                Tables\Columns\TextColumn::make('seat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('departure'),
                Tables\Columns\TextColumn::make('flight')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maskapais.name')
                    ->label('Maskapai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('include')
                    ->searchable()
                    ->limit(30)
                    ->html(),
                Tables\Columns\TextColumn::make('outclude')
                    ->searchable()
                    ->limit(30)
                    ->html(),
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
                Action::make('Atur Banner')
                    ->color('success')
                    ->icon('heroicon-m-photo')
                    ->url(
                        fn (Travel $record): string => static::getUrl('travel-banners.index', [
                            'parent' => $record->id,
                        ])
                    ),
                Action::make('Atur Harga')
                    ->color('primary')
                    ->icon('heroicon-m-currency-dollar')
                    ->url(
                        fn (Travel $record): string => static::getUrl('prices.index', [
                            'parent' => $record->id,
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTravel::route('/'),
            'create' => Pages\CreateTravel::route('/create'),
            'edit' => Pages\EditTravel::route('/{record}/edit'),

            //travel_banner
            'travel-banners.index' => ListTravelBanners::route('/{parent}/travel-banners'),
            'travel-banners.create' => CreateTravelBanner::route('/{parent}/travel-banners/create'),
            'travel-banners.edit' =>EditTravelBanner::route('/{parent}/travel-banners/{record}/edit'),
            //prices
            'prices.index' => ListPrices::route('/{parent}/prices'),
            'prices.create' => CreatePrice::route('/{parent}/prices/create'),
            'prices.edit' =>EditPrice::route('/{parent}/prices/{record}/edit'),

        ];
    }
}
