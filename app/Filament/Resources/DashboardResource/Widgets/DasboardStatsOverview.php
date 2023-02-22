<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Enroll;
use App\Models\Option;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class DasboardStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $enrolls = Enroll::all()->count();
        $options = Option::all()->count();
        $admins = User::all()->count();


        return [
            Card::make("Nombre d'inscrits", $enrolls)
                // ->description('32k increase')
                // ->descriptionIcon('heroicon-s-trending-up')
                // ->color('success')
                ,
                Card::make('Options disponibles', $options)
                // ->description('7% increase')
                // ->descriptionIcon('heroicon-s-trending-down')
                // ->color('danger')
                ,
                Card::make('Utilisateurs', $admins)
                // ->description('3% increase')
                // ->descriptionIcon('heroicon-s-trending-up')
                // ->color('success')
                ,
        ];
    }
}
