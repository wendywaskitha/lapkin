<?php

namespace App\Filament\Resources\EselonResource\Pages;

use App\Filament\Resources\EselonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEselons extends ListRecords
{
    protected static string $resource = EselonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
