<?php

namespace App\Filament\Resources\SubSkillsResource\Pages;

use App\Filament\Resources\SubSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubSkills extends ListRecords
{
    protected static string $resource = SubSkillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
