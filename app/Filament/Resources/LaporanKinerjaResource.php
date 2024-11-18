<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LaporanKinerja;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LaporanKinerjaResource\Pages;
use App\Filament\Resources\LaporanKinerjaResource\RelationManagers;

class LaporanKinerjaResource extends Resource
{
    protected static ?string $model = LaporanKinerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->native(false)
                    // ->maxDate(Carbon::now()->toDateString())
                    ->required(),
                Forms\Components\TimePicker::make('jam_awal')
                    ->native(false)
                    ->required(),
                Forms\Components\TimePicker::make('jam_akhir')
                    ->native(false)
                    ->required(),
                Forms\Components\Textarea::make('uraian')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('target')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('realisasi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('capaian')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pegawai')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_awal')
                    ->label('Waktu')
                    ->formatStateUsing(function ($record) {
                        return $record->jam_awal . ' - ' . $record->jam_akhir; // Combine both times with a dash
                    }),
                Tables\Columns\TextColumn::make('uraian'),
                Tables\Columns\TextColumn::make('target')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('realisasi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('capaian')
                    ->numeric()
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
                Tables\Filters\Filter::make('current_month')
                    ->form([
                        Forms\Components\DatePicker::make('created_at')
                            ->label('Filter by Created At')
                            ->default(Carbon::now()->startOfMonth()->toDateString()), // Default to the start of the current month
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['created_at'],
                            fn (Builder $query, $date): Builder => $query->whereMonth('created_at', Carbon::parse($date)->month)
                                ->whereYear('created_at', Carbon::parse($date)->year)
                        );
                    })
                    ->indicateUsing(function (array $data): ?string {
                        if (!$data['created_at']) {
                            return null;
                        }
                        return Carbon::parse($data['created_at'])->translatedFormat('F Y'); // Show month and year
                    }),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Kirim')
                    ->action(function () {
                        self::sendAllReports(); // Panggil metode statis
                    })
                    ->visible(function () {
                        return self::hasReportsToSend(); // Panggil metode statis
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLaporanKinerjas::route('/'),
            'create' => Pages\CreateLaporanKinerja::route('/create'),
            'edit' => Pages\EditLaporanKinerja::route('/{record}/edit'),
        ];
    }

    protected static function sendAllReports()
    {
        // Ambil semua laporan kinerja yang memiliki tanggal akhir bulan
        $reports = LaporanKinerja::whereDate('tanggal', now()->endOfMonth())->get();

        if ($reports->isEmpty()) {
            Notification::make()
                ->title('Tidak ada laporan untuk dikirim.')
                ->success()
                ->send();

            return;
        }

        foreach ($reports as $report) {
            // Logika untuk mengirim laporan
            $report->update(['status' => 'Dikirim']); // Update status laporan
        }

        Notification::make()
            ->title('Semua laporan kinerja berhasil dikirim ke pemeriksa!')
            ->success()
            ->send();
    }

    protected static function hasReportsToSend()
    {
        return LaporanKinerja::whereDate('tanggal', now()->endOfMonth())->exists();
    }
}
