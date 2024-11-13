<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Stpjm;
use Barryvdh\DomPDF\PDF;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StpjmResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StpjmResource\RelationManagers;

class StpjmResource extends Resource
{
    protected static ?string $model = Stpjm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('unitkerja_id')
                    ->relationship('unitkerja', 'name')
                    ->required(),
                Forms\Components\Select::make('tandatangan_id')
                    ->relationship('tandatangan', 'name')
                    ->required(),
                Forms\Components\Select::make('unit_kerja_id')
                    ->relationship('unitKerja', 'name')
                    ->required(),
                Forms\Components\Select::make('tanda_tangan_id')
                    ->relationship('tandaTangan', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->date('F Y')// Format to Month Year
                    ->badge() // Use badge styling
                    ->color('info') // Set color to info
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pegawai')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Generate PDF')
                    ->action(fn (Stpjm $record) => self::generatePdf($record)) // Call static method
                    ->icon('heroicon-o-arrow-down-tray'),
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
            'index' => Pages\ListStpjms::route('/'),
            'create' => Pages\CreateStpjm::route('/create'),
            'edit' => Pages\EditStpjm::route('/{record}/edit'),
        ];
    }

    protected static function generatePdf(Stpjm $record) // Make method static
    {
        $pdf = PDF::loadView('pdf.stpjm', ['record' => $record]);
        return $pdf->stream('stpjm_' . $record->id . '.pdf'); // Stream the PDF
    }
}
