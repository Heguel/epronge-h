<?php

namespace App\Filament\Resources\EnrollsResource\Pages;

use App\Filament\Resources\EnrollsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnrolls extends EditRecord
{
    protected static string $resource = EnrollsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
