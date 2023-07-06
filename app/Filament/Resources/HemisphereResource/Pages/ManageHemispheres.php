<?php

namespace App\Filament\Resources\HemisphereResource\Pages;

use App\Filament\Resources\HemisphereResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageHemispheres extends ManageRecords
{
    protected static string $resource = HemisphereResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
