<?php

namespace App\Filament\Resources\ProspectResource\Pages;

use App\Filament\Resources\ProspectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProspect extends ViewRecord
{
    protected static string $resource = ProspectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            //                Action::make('Update')
//                    ->color('success')
//                    ->icon('heroicon-o-user-add')
//                    ->url(fn (Prospect $record): string => ProspectResource1::getUrl('update', ['record' => $record]))

        ];
    }
}
