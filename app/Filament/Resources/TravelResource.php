<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelResource\Pages\CreateHotel;
use App\Filament\Resources\HotelResource\Pages\EditHotel;
use App\Filament\Resources\HotelResource\Pages\ListHotels;
use App\Filament\Resources\PlanResource\Pages\CreatePlan;
use App\Filament\Resources\PlanResource\Pages\EditPlan;
use App\Filament\Resources\PlanResource\Pages\ListPlans;
use App\Filament\Resources\PriceResource\Pages\CreatePrice;
use App\Filament\Resources\PriceResource\Pages\EditPrice;
use App\Filament\Resources\PriceResource\Pages\ListPrices;
use App\Filament\Resources\SyaratResource\Pages\CreateSyarat;
use App\Filament\Resources\SyaratResource\Pages\EditSyarat;
use App\Filament\Resources\SyaratResource\Pages\ListSyarats;
use App\Filament\Resources\TravelBannerResource\Pages\CreateTravelBanner;
use App\Filament\Resources\TravelBannerResource\Pages\EditTravelBanner;
use App\Filament\Resources\TravelBannerResource\Pages\ListTravelBanners;
use App\Filament\Resources\TravelResource\Pages;
use App\Filament\Resources\TravelResource\RelationManagers;
use App\Models\Maskapai;
use App\Models\Travel;
use App\Models\TravelBanner;
use App\Models\Hotel;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Enums\ActionsPosition;
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
                    Select::make('category')
                ->label('Kategori')
                ->options(
                  [
                     //Reguler, Plus Wisata, Haji Furoda, Badal Haji, Ramadhan, Haji Plus, Haji Mandiri, Haji Expatriat
                    'Reguler' => 'Reguler',
                    'Plus Wisata' => 'Plus Wisata',
                    'Haji Furoda' => 'Haji Furoda',
                    'Badal Haji' => 'Badal Haji',
                    'Ramadhan'=>'Ramadhan',
                    'Haji Plus'=>'Haji Plus',
                    'Haji Mandiri'=>'Haji Mandiri',
                    'Haji Expatriat'=>'Haji Expatriat'
                  ]
                  )
                  ->required(),
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
                Forms\Components\Select::make('duration')
                    ->label('Durasi')
                    ->required()
                    ->options(
                      [
                        //9,10,11,12
                        '9' => '9',
                        '10' => '10',
                        '11' => '11',
                        '12' => '12'
                      ]
                    ),
                Forms\Components\Select::make('maskapai')
                    ->label('Pilih Maskapai')
                    ->options(Maskapai::all()->pluck('name', 'id'))
                    ->searchable()
                    ->multiple()
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
                Tables\Columns\SelectColumn::make('category')
                ->label('Kategori')
                ->options(
                  [
                     //Reguler, Plus Wisata, Haji Furoda, Badal Haji, Ramadhan, Haji Plus, Haji Mandiri, Haji Expatriat
                    'Reguler' => 'Reguler',
                    'Plus Wisata' => 'Plus Wisata',
                    'Haji Furoda' => 'Haji Furoda',
                    'Badal Haji' => 'Badal Haji',
                    'Ramadhan'=>'Ramadhan',
                    'Haji Plus'=>'Haji Plus',
                    'Haji Mandiri'=>'Haji Mandiri',
                    'Haji Expatriat'=>'Haji Expatriat'
                  ]
                  )
                    ->searchable(),
                Tables\Columns\TextColumn::make('seat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prices.price_dewasa')
                ->currency('IDR')
                ->color(fn (string $state): string => match ($state) {
                    $state => 'success',
                })
                ->icon('heroicon-s-currency-dollar'),
                Tables\Columns\TextColumn::make('departure'),
                Tables\Columns\TextColumn::make('flight')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maskapai')
                    ->badge()
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
                Action::make('Tambah Banner')
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
                Action::make('Tambah Hotel')
                    ->color('danger')
                    ->icon('heroicon-m-building-office-2')
                    ->url(
                        fn (Travel $record): string => static::getUrl('hotels.index', [
                            'parent' => $record->id,
                        ])
                        ),
                Action::make('Buat Planning')
                    ->color('primary')
                    ->icon('heroicon-m-paper-airplane')
                    ->url(
                        fn (Travel $record): string => static::getUrl('plans.index', [
                            'parent' => $record->id,
                        ])
                        ),
                Action::make('Tambahkan Syarat')
                        ->color('secondary')
                        ->icon('heroicon-m-wrench-screwdriver')
                        ->url(
                            fn (Travel $record): string => static::getUrl('syarats.index', [
                                'parent' => $record->id,
                            ])
                            )
            ], position: ActionsPosition::BeforeColumns)
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
            //hotels
            'hotels.index' => ListHotels::route('/{parent}/hotels'),
            'hotels.create' => CreateHotel::route('/{parent}/hotels/create'),
            'hotels.edit' =>EditHotel::route('/{parent}/hotels/{record}/edit'),
            //plans
            'plans.index' => ListPlans::route('/{parent}/plans'),
            'plans.create' => CreatePlan::route('/{parent}/plans/create'),
            'plans.edit' =>EditPlan::route('/{parent}/plans/{record}/edit'),
            //syarats
            'syarats.index' => ListSyarats::route('/{parent}/syarats'),
            'syarats.create' => CreateSyarat::route('/{parent}/syarats/create'),
            'syarats.edit' =>EditSyarat::route('/{parent}/syarats/{record}/edit'),

        ];
    }
}
