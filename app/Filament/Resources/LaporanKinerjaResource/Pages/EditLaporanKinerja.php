<?php

namespace App\Filament\Resources\LaporanKinerjaResource\Pages;

use App\Filament\Resources\LaporanKinerjaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanKinerja extends EditRecord
{
    protected static string $resource = LaporanKinerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
