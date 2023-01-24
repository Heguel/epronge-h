<?php

namespace App\Filament\Resources\EnrollsResource\Pages;

use App\Filament\Resources\EnrollsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnrolls extends ListRecords
{
    protected static string $resource = EnrollsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
