<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanKinerjaResource\Pages;
use App\Filament\Resources\LaporanKinerjaResource\RelationManagers;
use App\Models\LaporanKinerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

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
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_awal'),
                Tables\Columns\TextColumn::make('jam_akhir'),
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
            'index' => Pages\ListLaporanKinerjas::route('/'),
            'create' => Pages\CreateLaporanKinerja::route('/create'),
            'edit' => Pages\EditLaporanKinerja::route('/{record}/edit'),
        ];
    }
}
