<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CounsellingRequestWidget extends BaseWidget
{

    protected static ?int $sort = 3;
    protected function getCards(): array
    {
        return [
            Card::make('New Counselling Requests', '19'),
            Card::make('In progress Counselling Requests', '21'),
            Card::make('Closed Counselling Requests', '12'),
        ];
    }
}
