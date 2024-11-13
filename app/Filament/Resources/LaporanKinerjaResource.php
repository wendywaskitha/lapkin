<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LaporanKinerja;
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
                Forms\Components\TimePicker::make('jam_kerja')
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
                Tables\Filters\SelectFilter::make('month_filter')
                    ->label('Filter by Month')
                    ->options([
                        'current' => 'Current Month',
                        'all' => 'All Months',
                    ])
                    ->query(function (Builder $query, $value) {
                        if ($value === 'current') {
                            return $query->whereMonth('tanggal', Carbon::now()->month)
                                         ->whereYear('tanggal', Carbon::now()->year);
                        }
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
