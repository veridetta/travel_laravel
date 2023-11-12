<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{


    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('dashboard')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->colors([
                'primary' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,

            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->navigationItems([
              NavigationItem::make('Paket Umroh')
                  ->url('/ajax-paket/semua/semua/semua/segera?price=semua&duration=semua', shouldOpenInNewTab: true)
                  ->icon('heroicon-o-briefcase')
                  ->sort(1),
              NavigationItem::make('Profile')
                  ->url('/dashboard/profile', shouldOpenInNewTab: false)
                  ->icon('heroicon-o-user')
                  ->sort(2),
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Data & Management')
                    ,
                NavigationGroup::make()
                    ->label('Pemesanan & Pembayaran')
                    ,
                NavigationGroup::make()
                     ->label('Website')
                     ,
                NavigationGroup::make()
                     ->label('Layouts')
                     ,
                NavigationGroup::make()
                     ->label('Fixed Contents')
                     ,
                NavigationGroup::make()
                     ->label('Static Contents')
                     ,
                NavigationGroup::make()
                    ->label('Settings')
                    ->collapsed()
                    ,
            ]);
    }


}
