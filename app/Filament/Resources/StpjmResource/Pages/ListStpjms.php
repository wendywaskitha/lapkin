<?php

namespace App\Filament\Resources\StpjmResource\Pages;

use App\Filament\Resources\StpjmResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStpjms extends ListRecords
{
    protected static string $resource = StpjmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
