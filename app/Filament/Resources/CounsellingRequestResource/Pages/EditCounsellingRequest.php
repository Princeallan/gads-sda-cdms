<?php

namespace App\Filament\Resources\CounsellingRequestResource\Pages;

use App\Filament\Resources\CounsellingRequestResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCounsellingRequest extends EditRecord
{
    protected static string $resource = CounsellingRequestResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
