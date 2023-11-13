<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Order;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Pemesanan & Pembayaran';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel="Pembayaran";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ////direct, bank, total_price, status, type, bukti
                Forms\Components\Select::make('direct')
                  ->label('Metode Pembayaran')
                  ->options([
                    '1' => 'Direct Transfer',
                    '0' => 'Virtual Account',
                ])
                  ->required()
                  ->disabled(),
                Forms\Components\TextInput::make('bank')
                  ->label('Bank')
                  ->required()
                  ->disabled(),
                Forms\Components\TextInput::make('total_price')
                  ->label('Total Pembayaran')
                  ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)
                  ->disabled(),
                Forms\Components\Select::make('type')
                  ->label('Tipe Pembayaran')
                  ->options([
                    'dp' => 'DP',
                    'full' => 'Pembayaran Penuh',
                    'penarikan' => 'Penarikan Dana',
                ])
                  ->required()
                  ->disabled(function(){
                    if(auth()->user()->role=='agent' or auth()->user()->role=='user'){
                      return true;
                    }else{
                      return false;
                    };
                  }),
                Forms\Components\FileUpload::make('bukti')
                ->visibility('public')
                ->columnSpanFull(),
                Placeholder::make('statuspl')
                  ->label('Status Pembayaran')
                  ->content(
                    function(Get $get, Set $set){
                      if(auth()->user()->role=='user'){
                        if($get('bukti')!=null){
                          $set('status', 'Menunggu Konfirmasi');
                          return 'Menunggu Konfirmasi';
                        }
                      }
                    }
                  )
                  ->columnSpanFull(),
                Forms\Components\Select::make('status')
                  ->label('Status')
                  ->live()
                  ->afterStateUpdated(function(Get $get, Set $set){
                    if($get('status')=='Lunas'){
                      if($get('type')=='dp'){
                        $order = Order::where('id', '=', $get('order_id'))->first();
                        $order->dp = $get('total_price');
                        $order->save();
                      }else{
                        $order = Order::where('id', '=', $get('order_id'))->first();
                        $order->status = "Lunas";
                        $order->save();
                      }
                    }
                  })
                  ->options(
                    function(Get $get){
                      if(auth()->user()->role=='user'){
                        if($get('bukti')!=null){
                          return [
                            'Menunggu Konfirmasi'=> 'Menunggu Konfirmasi',
                          ];
                        }else{
                          return [
                            'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                          ];
                        }
                      }else{
                        if($get('type')=='penarikan'){
                          return [
                            'Menunggu Konfirmasi'=> 'Menunggu Konfirmasi',
                            'Dibayarkan' => 'Dibayarkan',
                            'Gagal' => 'Gagal',
                          ];
                        }else{
                          return [
                            'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                            'Menunggu Konfirmasi'=> 'Menunggu Konfirmasi',
                            'Lunas' => 'Lunas',
                            'Gagal' => 'Gagal',
                          ];
                        }
                      }
                    }
                  )
                  ->placeholder(
                    function (string $state) {
                      if($state==null){
                        return 'Menunggu Pembayaran';
                      }else{
                        return $state;
                      }
                    }
                  )
                  ->required()
                  ->default(
                    function(Get $get){
                      if($get('bukti')!=null){
                        return 'Menunggu Konfirmasi';
                      }else{
                        return 'Menunggu Pembayaran';
                      }
                    }
                  )
                  ->disabled(
                    function () {
                      if(auth()->user()->role=='agent'){
                        return true;
                      }else{
                        return false;
                      };
                    }
                  )->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //direct, bank, total_price, status, type, bukti
                Tables\Columns\TextColumn::make('direct')
                  ->searchable()
                  ->label('Metode Pembayaran')
                  ->formatStateUsing(fn (string $state): string => match ($state) {
                    '1' => 'Direct Transfer',
                    '0' => 'Virtual Account',
                    default => 'Direct Transfer',
                })
                  ->sortable(),
                Tables\Columns\TextColumn::make('bank')
                  ->label('Bank')
                  ->searchable()
                  ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                  ->label('Total Pembayaran')
                  ->searchable()
                  ->currency('IDR',2)
                  ->sortable(),
                Tables\Columns\TextColumn::make('status')
                  ->label('Status')
                  ->badge()
                  ->color(fn (string $state): string => match ($state) {
                      'pending' => 'Menunggu Pembayaran',
                      'success' => 'Lunas',
                      'success'=>'Dibayarkan',
                      'failed' => 'danger',
                      default => 'warning',
                  })
                  ->searchable()
                  ->sortable(),
                Tables\Columns\TextColumn::make('type')
                  ->label('Tipe Pembayaran')
                  ->formatStateUsing(fn (string $state): string => match ($state) {
                      'dp' => 'DP',
                      'full' => 'Pembayaran Penuh',
                      'penarikan'=>'Penarikan Dana',
                      default => 'DP',
                  })
                  ->searchable()
                  ->sortable(),
                ImageColumn::make('bukti')
                  ->label('Bukti Pembayaran')
                  ->searchable()
                  ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label(function(Payment $payment){
                  if(auth()->user()->role=='user'){
                    if($payment->status=='Menunggu Pembayaran'){
                      return 'Upload Bukti Pembayaran';
                    }else{
                      return 'Lihat Detail';
                    }
                  }else if(auth()->user()->role=='agent'){
                    return 'Lihat Detail';
                  }else{
                    return 'Ubah Status';
                  }
                })
                ->after(
                  function(Payment $payment){
                    if($payment->status=='Lunas'){
                      if($payment->type=='dp'){
                        $order = Order::where('id', '=', $payment->order_id)->first();
                        $order->dp = $payment->total_price;
                        $order->save();
                      }else{
                        $order = Order::where('id', '=', $payment->order_id)->first();
                        $order->status = "Lunas";
                        $order->save();
                      }
                    }
                  }
                ),
            ],
            position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
      //di agent payment hanya menampilkan request withdrawl saja
      if(auth()->user()->role=='user' or auth()->user()->role=='agent'){
        return parent::getEloquentQuery()->where('user_id', '=', auth()->user()->id);
      }else{
        return parent::getEloquentQuery();
      }

    }
}
