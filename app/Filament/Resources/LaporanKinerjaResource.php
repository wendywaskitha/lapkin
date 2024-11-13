<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LaporanKinerja;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
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
                Forms\Components\DateTimePicker::make('tanggal')
                    ->required(),
                Forms\Components\TextInput::make('jam_kerja')
                    ->required(),
                Forms\Components\Textarea::make('uraian')
                    ->required(),
                Forms\Components\TextInput::make('target')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('realisasi')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('capaian')
                    ->numeric()
                    ->required(),
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
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_kerja'),
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
                // Add a filter for the current month
                Tables\Filters\SelectFilter::make('month')
                    ->label('Month')
                    ->options([
                        1 => 'January',
                        2 => 'February',
                        3 => 'March',
                        4 => 'April',
                        5 => 'May',
                        6 => 'June',
                        7 => 'July',
                        8 => 'August',
                        9 => 'September',
                        10 => 'October',
                        11 => 'November',
                        12 => 'December',
                    ])
                    ->query(function (Builder $query, $month) {
                        return $query->whereMonth('tanggal', $month);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->query(function (Builder $query) {
                return $query->whereMonth('tanggal', Carbon::now()->month);
            })
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('tanggal', 'desc') // Optional: Sort by date descending
            ->query(function (Builder $query) {
                // Apply the current month filter by default
                return $query->whereMonth('tanggal', Carbon::now()->month);
            });
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
