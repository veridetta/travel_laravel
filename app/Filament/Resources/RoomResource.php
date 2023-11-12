<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Order;
use App\Models\Room;
use App\Models\Travel;
use Closure;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static string $parentResource = OrderResource::class;
    public static ?string $title="Jumlah Peserta";
    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->title;
    }
    public static function form(Form $form): Form
    {
      if(count(explode('/', url()->current()))<6){
        $currentUrl = url()->previous();
      }else{
        $currentUrl = url()->current();
      }
      $segments = explode('/', $currentUrl);
      $parentId = $segments[count($segments) - 3];
      $order = Order::find($parentId);
      $travel = Travel::where('id', $order->travel_id)->first();
      $price = $travel->prices->first();
      function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
      }
        return $form
            ->schema([
            Section::make('Jumlah Peserta')
              ->description('Masukan jumlah')
              ->schema([
                Forms\Components\TextInput::make('travel_id')
                ->hidden($travel->id),
            Forms\Components\TextInput::make('price_id')
                ->hidden($price->id),
                Forms\Components\TextInput::make('order_id')
                ->hidden($price->id),
            Forms\Components\TextInput::make('dewasa')
                ->label('Jumlah Dewasa')
                ->default(1)
                ->minValue(1)
                ->numeric()
                ->reactive()
                ->suffix(' orang '),
            Placeholder::make('total_dewasa')
                ->content(function (Get $get) use ($price): string {
                    return rupiah($get('dewasa')*$price->price_dewasa);
                }),
            Forms\Components\TextInput::make('anak')
                ->label('Jumlah Anak < 12 tahun')
                ->suffix(' orang ')
                ->default(0)
                ->reactive()
                ->numeric(),
                Placeholder::make('total_anak')
                ->content(function (Get $get) use ($price): string {
                    return rupiah($get('anak')*$price->price_dewasa);
                }),
            Forms\Components\TextInput::make('bayi')
                ->label('Jumlah Bayi < 2 tahun')
                ->suffix(' orang ')
                ->default(0)
                ->reactive()
                ->numeric(),
                Placeholder::make('total_bayi')
                ->content(function (Get $get) use ($price): string {
                    return rupiah($get('bayi')*$price->price_dewasa);
                }),
                Placeholder::make('grand_total')
                ->content(function (Get $get) use ($price): string {
                    return rupiah(($get('dewasa')*$price->price_dewasa)+($get('anak')*$price->price_dewasa)+($get('bayi')*$price->price_dewasa));
                })->columnSpanFull()
                ->label('Grand Total'),
              ])->columns(2),
              Section::make('Data Peserta')
              ->description('Masukan data peserta sesuai jumlah yang dipilih')
              ->schema([
                Repeater::make('pesertas')
                ->relationship()
                ->schema([
                Forms\Components\TextInput::make('order_id')
                ->hidden($price->id),
                Forms\Components\Select::make('title')
                    ->options([
                        'Tn' => 'Tn',
                        'Ny' => 'Ny',
                    ]),
                    TextInput::make('name')->required()->label('Nama Lengkap'),
                    //phone, email, birth, type enum(Bayi, Anak, Dewasa), passport
                    TextInput::make('phone')->required()->label('Nomor Telepon')->tel(),
                    TextInput::make('email')->label('Email')->email(),
                    DatePicker::make('birth')->required()->label('Tanggal Lahir'),
                    Forms\Components\Select::make('type')
                    ->options([
                        'Dewasa' => 'Dewasa',
                        'Anak' => 'Anak',
                        'Bayi' => 'Bayi',
                    ])->required()->label('Tipe Peserta'),
                    TextInput::make('passport')->label('Nomor Passport'),
                    ])
                    ->columns(2)
                    ->maxItems(function (Get $get) {
                      return $get('dewasa') + $get('anak') + $get('bayi');
                    })
                  ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('travel_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dewasa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('anak')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bayi')
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
               // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                 //   Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }*/
}
