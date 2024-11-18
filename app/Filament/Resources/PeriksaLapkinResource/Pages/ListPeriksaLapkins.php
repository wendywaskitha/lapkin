<?php

namespace App\Filament\Resources\PeriksaLapkinResource\Pages;

use App\Filament\Resources\PeriksaLapkinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriksaLapkins extends ListRecords
{
    protected static string $resource = PeriksaLapkinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
