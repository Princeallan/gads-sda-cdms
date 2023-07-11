<?php

namespace App\Filament\Resources\FellowshipCertificateResource\Pages;

use App\Filament\Resources\FellowshipCertificateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFellowshipCertificates extends ListRecords
{
    protected static string $resource = FellowshipCertificateResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
