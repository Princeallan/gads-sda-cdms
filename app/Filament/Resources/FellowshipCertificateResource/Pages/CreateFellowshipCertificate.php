<?php

namespace App\Filament\Resources\FellowshipCertificateResource\Pages;

use App\Filament\Resources\FellowshipCertificateResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFellowshipCertificate extends CreateRecord
{
    protected static string $resource = FellowshipCertificateResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
