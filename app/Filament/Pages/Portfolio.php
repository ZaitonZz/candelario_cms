<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;


class Portfolio extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-trophy';
    protected static ?string $navigationLabel = 'Portfolio';

    protected static string $view = 'filament.pages.edit-section';
    public ?array $data = [];
    protected static ?int $navigationSort = 8;

    public function mount(): void
    {
        $this->form->fill(auth()->user()->portfolio->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Title')
                    ->placeholder('Enter the title'),

                TextInput::make('subtitle')
                    ->required()
                    ->label('Subtitle')
                    ->placeholder('Enter the subtitle'),
            ])
            ->columns(2)
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            //$data['photo'] = "http://127.0.0.1:8000/api/image/".$data['photo'];
            auth()->user()->portfolio->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
