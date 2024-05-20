<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class Nav extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'NavBar';
    protected static string $view = 'filament.pages.edit-section';
    public ?array $data = [];
    protected static ?int $navigationSort = 12;

    public function mount(): void
    {
        $this->form->fill(auth()->user()->navbar->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('section_one_text')
                    ->required()
                    ->label('Section One Text')
                    ->placeholder('Enter the section text'),

                TextInput::make('section_one_link')
                    ->required()
                    ->label('Section One Link')
                    ->placeholder('Enter the section link'),

                TextInput::make('section_two_text')
                    ->required()
                    ->label('Section Two Text')
                    ->placeholder('Enter the section text'),

                TextInput::make('section_two_link')
                    ->required()
                    ->label('Section Two Link')
                    ->placeholder('Enter the section link'),

                TextInput::make('section_three_text')
                    ->required()
                    ->label('Section Three Text')
                    ->placeholder('Enter the section text'),

                TextInput::make('section_three_link')
                    ->required()
                    ->label('Section Three Link')
                    ->placeholder('Enter the section link'),

                TextInput::make('section_four_text')
                    ->required()
                    ->label('Section Four Text')
                    ->placeholder('Enter the section text'),

                TextInput::make('section_four_link')
                    ->required()
                    ->label('Section Four Link')
                    ->placeholder('Enter the section link'),

                TextInput::make('section_five_text')
                    ->required()
                    ->label('Section Five Text')
                    ->placeholder('Enter the section text'),

                TextInput::make('section_five_link')
                    ->required()
                    ->label('Section Five Link')
                    ->placeholder('Enter the section link'),
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

            auth()->user()->navbar->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
