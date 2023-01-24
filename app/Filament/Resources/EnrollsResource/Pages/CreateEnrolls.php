<?php

namespace App\Filament\Resources\EnrollsResource\Pages;

use App\Filament\Resources\EnrollsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEnrolls extends CreateRecord
{
    protected static string $resource = EnrollsResource::class;

    public function getRedirectUrl():string
    {
        return $this->getResource()::getUrl('index');
    }
}
