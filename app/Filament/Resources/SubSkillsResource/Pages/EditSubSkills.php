<?php

namespace App\Filament\Resources\SubSkillsResource\Pages;

use App\Filament\Resources\SubSkillsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubSkills extends EditRecord
{
    protected static string $resource = SubSkillsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
