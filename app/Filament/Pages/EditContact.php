<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class EditContact extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left';

    protected static string $view = 'filament.pages.edit-section';
    public ?array $data = [];
    protected static ?int $navigationSort = 10;

    public function mount(): void
    {
        $this->form->fill(auth()->user()->contact->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Title')
                    ->placeholder('Enter the title')
                    ->columnSpanFull(),

                TextInput::make('field_one_text')
                    ->required()
                    ->label('Field One Text')
                    ->placeholder('Enter the field text'),
                
                TextInput::make('field_one_placeholder')
                    ->required()
                    ->label('Field One Placeholder')
                    ->placeholder('Enter the field placeholder'),

                TextInput::make('field_two_text')
                    ->required()
                    ->label('Field Two Text')
                    ->placeholder('Enter the field text'),
                
                TextInput::make('field_two_placeholder')
                    ->required()
                    ->label('Field Two Placeholder')
                    ->placeholder('Enter the field placeholder'),

                TextInput::make('field_three_text')
                    ->required()
                    ->label('Field Three Text')
                    ->placeholder('Enter the field text'),
                
                TextInput::make('field_three_placeholder')
                    ->required()
                    ->label('Field Three Placeholder')
                    ->placeholder('Enter the field placeholder'),

                TextInput::make('field_four_text')
                    ->required()
                    ->label('Field Four Text')
                    ->placeholder('Enter the field text'),
                
                TextInput::make('field_four_placeholder')
                    ->required()
                    ->label('Field Four Placeholder')
                    ->placeholder('Enter the field placeholder'),

                
                TextInput::make('button_text')
                    ->required()
                    ->label('Button Text')
                    ->placeholder('Enter the Button text'),
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

            auth()->user()->contact->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
