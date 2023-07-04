<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget;

class CustomAccountWidget extends AccountWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';


}
