<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\PesertaResource\Pages\CreatePeserta;
use App\Filament\Resources\PesertaResource\Pages\EditPeserta;
use App\Filament\Resources\PesertaResource\Pages\ListPesertas;
use App\Filament\Resources\RoomResource\Pages\CreateRoom;
use App\Filament\Resources\RoomResource\Pages\EditRoom;
use App\Filament\Resources\RoomResource\Pages\ListRooms;
use App\Models\Order;
use App\Models\Travel;
use Closure;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;

class OrderResource extends Resource
{
  public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->name;
    }
    protected static ?string $model = Order::class;
    public function __construct()
    {
        self::$navigationGroup = $this->whereGroup();
    }
    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Financial';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel="Pesanan";
    public static ?string $title="Data Pesanan";
    public static function form(Form $form): Form
    {
      if(count(explode('/', url()->current()))<6){
        $currentUrl = url()->previous();
        $id = explode('/', $currentUrl)[5];
      }else{
        $id= request()->route('record');
      }
      $order = Order::find($id);
      $travel = Travel::where('id', $order->travel_id)->first();
      $price = $travel->prices->first();
      $tott=0;
      function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
      }


        return $form
            ->schema([
                Forms\Components\TextInput::make('travel_id')
                    ->numeric()
                    ->hidden($travel->id),
                Forms\Components\TextInput::make('user_id')
                    ->hidden(auth()->user()->id)
                    ->numeric(),
                Forms\Components\TextInput::make('agent_id')
                    ->hidden($travel->user_id)
                    ->numeric(),
              Section::make('Jumlah Peserta')
              ->description('Masukan jumlah')
              ->schema([
              Repeater::make('rooms')
                ->label('Form Jumlah Peserta')
                ->relationship()
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
                    ->disabled(fn(Get $get) => $get('dewasa') > 1)
                    ->numeric()
                    ->live()
                    ->suffix(' orang '),
                  Placeholder::make('total_dewasa')
                    ->content(function (Get $get) use ($price): string {
                        return rupiah($get('dewasa')*$price->price_dewasa);
                    }),
                  Forms\Components\TextInput::make('anak')
                    ->label('Jumlah Anak < 12 tahun')
                    ->suffix(' orang ')
                    ->default(0)
                    ->disabled(fn(Get $get) => $get('dewasa') > 1)
                    ->minValue(0)
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
                    ->minValue(0)
                    ->disabled(fn(Get $get) => $get('dewasa') > 1)
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
                ])->columns(2)->maxItems(1)
                ->minItems(1)
                ->deletable(false),
              ]),
              Section::make('Data Peserta')
                ->description('Masukan data peserta sesuai jumlah yang dipilih')
                ->schema([
                Repeater::make('pesertas')
                  ->label('Form Data Peserta')
                  ->relationship()
                  ->schema([
                  Forms\Components\Select::make('title')
                  ->disabled(fn(Get $get) => $get('name') !=="")
                    ->options([
                        'Tn' => 'Tn',
                        'Ny' => 'Ny',
                    ]),
                  TextInput::make('name')->required()->label('Nama Lengkap')
                  ->disabled(fn(Get $get) => $get('name') !==""),
                  TextInput::make('phone')->required()->label('Nomor Telepon')->tel()
                  ->disabled(auth()->user()->id!==$order->user_id),
                  TextInput::make('email')->label('Email')->email(),
                  DatePicker::make('birth')->required()->label('Tanggal Lahir')->disabled(fn(Get $get) => $get('name') !==""),
                  Forms\Components\Select::make('type')
                    ->options([
                        'Dewasa' => 'Dewasa',
                        'Anak' => 'Anak',
                        'Bayi' => 'Bayi',
                    ])->required()->label('Tipe Peserta')->disabled(auth()->user()->id!==$order->user_id),
                  TextInput::make('passport')->label('Nomor Passport')->disabled(auth()->user()->id!==$order->user_id),
                ])
                  ->columns(2)
                  ->deletable(false)
                  ->maxItems(function (Get $get) {
                      foreach ($get('rooms') as $room) {
                          return $room['dewasa'] + $room['anak'] + $room['bayi'];
                      }
                    })
                  ->minItems(function (Get $get) {
                      foreach ($get('rooms') as $room) {
                          return $room['dewasa'] + $room['anak'] + $room['bayi'];
                      }
                    })
              ]),
                Placeholder::make('total_prices')
                    ->content(function (Get $get, Set $set) use ($price): string {
                        if($get('rooms')){
                          foreach ($get('rooms') as $room) {
                            $total = ($room['dewasa']*$price->price_dewasa)+($room['anak']*$price->price_dewasa)+($room['bayi']*$price->price_dewasa);
                              $set('total_price', $total);
                              return $total;
                          }
                        }else{
                          return 0;
                        }
                }),

                TextInput::make('total_price')
                ->hidden(),
                Forms\Components\TextInput::make('status')
                    ->disabled('Menunggu Pembayaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('travel.title')
                    ->label('Paket')
                    ->sortable(),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('Nama Pemesan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('agents.name')
                    ->label('Nama Agen')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->currency('IDR')
                    ->badge('success')
                    ->label('Total Harga')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(
                        fn (Order $record): string => match ($record->status) {
                            'pending' => 'warning',
                            'success' => 'success',
                            'failed' => 'danger',
                            default => 'primary',
                        }
                    )
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
                Tables\Actions\EditAction::make()
                ->label("Atur"),
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                   // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(null); ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public function whereGroup():String
    {
      if(auth()->user()->role=='user'){
        return '';
      }else{
        return 'Financial';
      }
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            //rooms
            'rooms.index' => ListRooms::route('/{parent}/rooms'),
            'rooms.create' => CreateRoom::route('/{parent}/rooms/create'),
            'rooms.edit' =>EditRoom::route('/{parent}/rooms/{record}/edit'),
            //pesertas
            'pesertas.index' => ListPesertas::route('/{parent}/pesertas'),
            'pesertas.create' => CreatePeserta::route('/{parent}/pesertas/create'),
            'pesertas.edit' =>EditPeserta::route('/{parent}/pesertas/{record}/edit'),

        ];
    }
}
