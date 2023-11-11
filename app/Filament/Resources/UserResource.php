<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages\CreateAgent;
use App\Filament\Resources\AgentResource\Pages\EditAgent;
use App\Filament\Resources\AgentResource\Pages\ListAgents;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Agent;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction as ActionsEditAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;
class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Data & Management';

    protected static ?string $navigationLabel="Data Agent";

    public static function getRecordTitle(?Model $record): string|null|Htmlable
    {
        return $record->name;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('role')
                  ->label('Jenis')
                  ->disabled()
                  ->default('agent'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state)=>Hash::make($state))
                    ->dehydrated(fn($state)=>filled($state))
                    ->required(fn(Page $livewire )=> $livewire instanceof CreateUser)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->searchable(),
            Tables\Columns\TextColumn::make('email_verified_at')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime('d-M-Y')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            ActionsAction::make('Manage Agen')
                    ->color('success')
                    ->icon('heroicon-o-identification')
                    ->url(
                        fn (User $record): string => static::getUrl('agents.index', [
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            //agents
            'agents.index' => ListAgents::route('/{parent}/agents'),
            'agents.create' => CreateAgent::route('/{parent}/agents/create'),
            'agents.edit' =>EditAgent::route('/{parent}/agents/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
      if(auth()->user()->role=='user' or auth()->user()->role=='agent'){
        return parent::getEloquentQuery()->where('name', '!=', 'Admin')->where('role', '!=', 'user')->where('id', '!=', auth()->user()->id);
      }else{
        return parent::getEloquentQuery()->where('name', '!=', 'Admin')->where('role', '!=', 'user')->where('role', '!=', 'superAdmin');
      }

    }
}
