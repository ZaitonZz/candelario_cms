<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class Experience extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationLabel = 'Experience';
    protected static string $view = 'filament.pages.edit-section';
    protected static ?int $navigationSort = 6;
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(auth()->user()->experience->attributesToArray());
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

                TextInput::make('section_one_icon')
                    ->required()
                    ->label('Section One Icon')
                    ->placeholder('Enter the Icon name for Section One'),

                TextInput::make('section_one_text')
                    ->required()
                    ->label('Section One Text')
                    ->placeholder('Enter the descriptive text for Section One'),

                TextInput::make('section_two_icon')
                    ->required()
                    ->label('Section Two Icon')
                    ->placeholder('Enter the Icon name for Section Two'),

                TextInput::make('section_two_text')
                    ->required()
                    ->label('Projects Text')
                    ->placeholder('Enter the descriptive text for Section Two'),
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

            // $data['photo'] = "http://127.0.0.1:8000/api/image/".$data['photo'];
            auth()->user()->experience->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
