<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StpjmResource\Pages;
use App\Filament\Resources\StpjmResource\RelationManagers;
use App\Models\Stpjm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unitkerja.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tandatangan.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unitKerja.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tandaTangan.name')
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
            'index' => Pages\ListStpjms::route('/'),
            'create' => Pages\CreateStpjm::route('/create'),
            'edit' => Pages\EditStpjm::route('/{record}/edit'),
        ];
    }
}
