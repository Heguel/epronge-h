<?php

namespace App\Filament\Resources\EnrollsResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\EnrollsResource;
use App\Filament\Resources\DashboardResource\Widgets\DasboardStatsOverview;

class ListEnrolls extends ListRecords
{
    protected static string $resource = EnrollsResource::class;
    protected static ?string $pollingInterval = '10s';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         DasboardStatsOverview::class,
    //     ];
    // }

}
