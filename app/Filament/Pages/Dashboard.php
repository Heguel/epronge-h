<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\View\View;
use Filament\Pages\Dashboard as BasePage;
use App\Filament\Resources\DashboardResource\Widgets\DasboardStatsOverview;

class Dashboard extends BasePage
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            DasboardStatsOverview::class,
        ];
    }
    
    protected function getFooterWidgets():array
    {
        return [

        ];
    }
}
