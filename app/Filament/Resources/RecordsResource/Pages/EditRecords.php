<?php

namespace App\Filament\Resources\RecordsResource\Pages;

use App\Filament\Resources\RecordsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecords extends EditRecord
{
    protected static string $resource = RecordsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
