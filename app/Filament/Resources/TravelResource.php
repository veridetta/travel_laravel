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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
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
                Section::make('Travel Banner')
                    ->description('Banner yang akan ditampilkan di halaman utama')
                    ->schema([
                      Repeater::make('travel_banners')
                        ->relationship()
                        ->schema([
                          FileUpload::make('path')
                            ->label('Upload Gambar')
                            ->image()
                            ->required()
                            ->visibility('public')
                            ->directory('travel_banners')
                            ->columnSpanFull(),
                        ])
                        ]),
                Section::make('Harga')
                    ->description('Masukan Paket Harga')
                    ->schema([
                      Repeater::make('prices')
                        ->relationship()
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
                        ])
                        ->maxItems(1)
                      ]),
                Section::make('Tambah Hotel')
                    ->description('Masukan data Hotel yang akan digunakan')
                    ->schema([
                      Repeater::make('hotels')
                        ->relationship()
                        ->schema([
                          Forms\Components\TextInput::make('name')
                              ->label('Nama Hotel')
                              ->required()
                              ->maxLength(255),
                          Forms\Components\TextInput::make('city')
                              ->label('Kota')
                              ->required()
                              ->maxLength(255),
                          Forms\Components\FileUpload::make('image')
                              ->image()
                              ->columnSpanFull()
                              ->visibility('public')
                              ->required(),
                          Forms\Components\RichEditor::make('description')
                              ->required()
                              ->columnSpanFull(),
                          RatingStar::make('stars')
                              ->label('Bintang')
                              ->columnSpanFull(),
                          Select::make('room_type')
                              ->label('Tipe Kamar')
                              ->options(
                                  [
                                      'Single' => 'Single',
                                      'Double' => 'Double',
                                      'Twin' => 'Twin',
                                      'Triple' => 'Triple',
                                      'Quad' => 'Quad'
                                  ],
                              )
                              ->required(),
                          Forms\Components\TextInput::make('room_capacity')
                              ->label('Kapasitas Kamar')
                              ->required()
                              ->numeric(),
                        ])
                                ]),
                 Section::make('Buat Planning')
                    ->description('Masukan data Planning Selama Perjalanan')
                    ->schema([
                      Repeater::make('plans')
                        ->relationship()
                        ->schema([
                          Forms\Components\TextInput::make('day')
                              ->required()
                              ->numeric(),
                          Forms\Components\RichEditor::make('title')
                              ->label('Keterangan')
                              ->required()
                              ->columnSpanFull(),
                        ])
                        ]),
                Section::make('Tambahkan Syarat dan Ketentuan')
                    ->description('Masukan data Syarat dan Ketentuan')
                    ->schema([
                      Repeater::make('syarats')
                        ->relationship()
                        ->schema([
                          Forms\Components\RichEditor::make('description')
                          ->label('Syarat & Ketentuan')
                          ->required()
                          ->columnSpanFull(),
                        ])
                    ])
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
                    ->searchable()
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration')
                    ->formatStateUsing(function(string $state){
                        return $state.' Hari';
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('maskapais')
                  ->formatStateUsing(function(string $state, Model $record) {
                    $maskapai = Maskapai::whereIn('id', $record->maskapai)->get();
                    $names = $maskapai->pluck('name')->join(', ');
                    return $names;
                  })
                  ->badge()
                  ->separator(',')
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

        ];
    }
}
