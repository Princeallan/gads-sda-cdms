<?php

namespace App\Filament\Resources\CounsellingRequestResource\Pages;

use App\Filament\Resources\CounsellingRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCounsellingRequest extends CreateRecord
{
    protected static string $resource = CounsellingRequestResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
