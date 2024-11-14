<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailPegawaiRelationManager extends RelationManager
{
    protected static string $relationship = 'detailPegawai';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nip') // Add NIP field
                    ->label('NIP')
                    ->required(),
                Forms\Components\Select::make('pangkat_id') // Example for another field
                    ->relationship('pangkat', 'name') // Assuming there's a relationship with Pangkat
                    ->label('Pangkat/ Golongan')
                    ->required(),
                Forms\Components\Select::make('jabatan_id') // Example for another field
                    ->relationship('jabatan', 'name') // Assuming there's a relationship with Pangkat
                    ->label('Jabatan')
                    ->required(),
                Forms\Components\Select::make('eselon_id') // Example for another field
                    ->relationship('eselon', 'name') // Assuming there's a relationship with Pangkat
                    ->label('Eselon')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nip')
            ->columns([
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\TextColumn::make('pangkat.name'),
                Tables\Columns\TextColumn::make('jabatan.name'),
                Tables\Columns\TextColumn::make('eselon.name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
