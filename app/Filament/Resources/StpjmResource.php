<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Stpjm;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;
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
                Forms\Components\Select::make('tanda_tangan_id')
                    ->relationship('tandatangan', 'name')
                    ->required(),
                Forms\Components\Select::make('unit_kerja_id')
                    ->relationship('unitKerja', 'name')
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
                ->action(fn (Stpjm $record) => StpjmResource::downloadPdf($record)) // Call the downloadPdf method from the resource
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

    public static function downloadPdf(Stpjm $record)
    {
        // Eager load the user and detailPegawai relationships on the existing record
        $record->load('user.detailPegawai');

        // Check if the record exists
        if (!$record) {
            return redirect()->back()->with('error', 'STPJM not found.');
        }

        // Sanitize the record's data to ensure it is UTF-8 encoded
        $sanitizedRecord = self::sanitizeRecord($record);

        // Sanitize user name as well
        if ($sanitizedRecord->user) {
            $sanitizedRecord->user->name = mb_convert_encoding($sanitizedRecord->user->name, 'UTF-8', 'auto');
        }

        // Load the PDF view with sanitized data
        $pdf = Pdf::loadView('pdf.stpjm', ['record' => $sanitizedRecord]);

        // Return the PDF as a stream to display in the browser
        return response()->stream(function () use ($pdf) {
            echo $pdf->output(); // Output the PDF content
        }, 200, [ // Make sure 200 is an integer
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="stpjm_' . $sanitizedRecord->id . '.pdf"', // Use 'inline' to display in browser
        ]);
    }

    protected static function sanitizeRecord(Stpjm $record): Stpjm
    {
        // Create a new instance to avoid modifying the original record
        $sanitizedRecord = clone $record;

        // Loop through the record's attributes and sanitize them
        foreach ($sanitizedRecord->getAttributes() as $key => $value) {
            if (is_string($value)) {
                // Check and convert encoding if necessary
                if (!mb_check_encoding($value, 'UTF-8')) {
                    $sanitizedRecord->$key = mb_convert_encoding($value, 'UTF-8', 'auto');
                }
            }
        }

        return $sanitizedRecord;
    }
}
