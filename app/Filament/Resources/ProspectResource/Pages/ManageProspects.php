<?php

namespace App\Filament\Resources\ProspectResource\Pages;

use App\Filament\Resources\ProspectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProspects extends ManageRecords
{
    protected static string $resource = ProspectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
