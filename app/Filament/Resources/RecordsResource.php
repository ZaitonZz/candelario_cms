<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecordsResource\Pages;
use App\Filament\Resources\RecordsResource\RelationManagers;
use App\Models\Record;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

class RecordsResource extends Resource
{
    protected static ?string $model = Record::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('record_year')
                    ->required()
                    ->label('Record Year')
                    ->placeholder('Enter the year range'),

                TextInput::make('record_title')
                    ->required()
                    ->label('Record Title')
                    ->placeholder('Enter the record title'),
                TextInput::make('record_subtitle')
                    ->required()
                    ->label('Record Subtitle')
                    ->placeholder('Enter the record subtitle'),

                TextInput::make('table_num')
                    ->required()
                    ->label('Table Number')
                    ->placeholder('Enter the Table Number'),

                TextInput::make('position')
                    ->required()
                    ->label('Position')
                    ->placeholder('Enter the position'),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('record_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('record_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('record_subtitle')
                    ->sortable(),
                Tables\Columns\TextColumn::make('table_num')
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
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
            'index' => Pages\ListRecordss::route('/'),
            'create' => Pages\CreateRecords::route('/create'),
            'edit' => Pages\EditRecords::route('/{record}/edit'),
        ];
    }
}
