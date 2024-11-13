<?php

namespace App\Filament\Resources\StpjmResource\Pages;

use App\Filament\Resources\StpjmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStpjm extends EditRecord
{
    protected static string $resource = StpjmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
