<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\PeriksaLapkin;
use App\Models\LaporanKinerja;
use Filament\Resources\Resource;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeriksaLapkinResource\Pages;
use App\Filament\Resources\PeriksaLapkinResource\RelationManagers;

class PeriksaLapkinResource extends Resource
{
    protected static ?string $model = LaporanKinerja::class;

    protected static ?string $navigationLabel = 'Periksa Laporan Kinerja';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    Tables\Columns\TextColumn::make('user.name')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('detailPegawai.nip')
                        ->label('NIP')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('detailPegawai.pangkat.name'),
                    Tables\Columns\TextColumn::make('detailPegawai.jabatan.name'),
                    Tables\Columns\TextColumn::make('detailPegawai.eselon.name'),
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeriksaLapkins::route('/'),
            'create' => Pages\CreatePeriksaLapkin::route('/create'),
            'edit' => Pages\EditPeriksaLapkin::route('/{record}/edit'),
        ];
    }
}
