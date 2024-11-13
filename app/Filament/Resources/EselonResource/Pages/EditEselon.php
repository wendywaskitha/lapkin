<?php

namespace App\Filament\Resources\EselonResource\Pages;

use App\Filament\Resources\EselonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEselon extends EditRecord
{
    protected static string $resource = EselonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
