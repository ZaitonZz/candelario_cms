<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubSkillsResource\Pages;
use App\Filament\Resources\SubSkillsResource\RelationManagers;
use App\Models\SubSkills;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubSkillsResource extends Resource
{
    protected static ?string $model = SubSkills::class;

    protected static ?string $navigationIcon = 'heroicon-s-code-bracket-square';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('icon')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('skill_text')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('table_num')
                    ->required()
                    ->maxLength(255)
                    ->numeric(),
                Forms\Components\TextInput::make('position')
                    ->required()
                    ->maxLength(255)
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('skill_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('table_num')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
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
            'index' => Pages\ListSubSkills::route('/'),
            'create' => Pages\CreateSubSkills::route('/create'),
            'edit' => Pages\EditSubSkills::route('/{record}/edit'),
        ];
    }
}
