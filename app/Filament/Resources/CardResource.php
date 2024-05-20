<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CardResource\Pages;
use App\Filament\Resources\CardResource\RelationManagers;
use App\Models\Card;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;

class CardResource extends Resource
{
    protected static ?string $model = Card::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?int $navigationSort = 8;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('card_title')
                    ->required()
                    ->label('Card Title')
                    ->placeholder('Enter the Card Title'),

                TextInput::make('card_desc')
                    ->required()
                    ->label('Card Description')
                    ->placeholder('Enter the Card Description'),
                TextInput::make('card_link')
                    ->required()
                    ->label('Card Link')
                    ->placeholder('Enter the Card Link'),

                TextInput::make('table_num')
                    ->required()
                    ->label('Table Number')
                    ->placeholder('Enter the Table Number'),
                TextInput::make('card_icon')
                    ->required()
                    ->label('Card Icon')
                    ->placeholder('Enter the Card Icon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('card_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('card_desc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('card_link')
                    ->sortable(),
                Tables\Columns\TextColumn::make('table_num')
                    ->sortable(),
                Tables\Columns\TextColumn::make('card_icon')
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
            'index' => Pages\ListCards::route('/'),
            'create' => Pages\CreateCard::route('/create'),
            'edit' => Pages\EditCard::route('/{record}/edit'),
        ];
    }
}
