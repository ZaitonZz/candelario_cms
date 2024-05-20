<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Actions\Action;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class About extends Page
{
    //use InteractsWithRecord;
    protected static ?string $navigationIcon = 'heroicon-o-finger-print';
    protected static ?string $navigationLabel = 'About';

    protected static string $view = 'filament.pages.edit-section';
    public ?array $data = [];
    protected static ?int $navigationSort = 3;

    public function mount(): void
    {
        $this->form->fill(auth()->user()->about->attributesToArray());
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

                FileUpload::make('photo')
                    ->disk('public')
                    ->imageEditor()
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->required()
                    ->label('Description')
                    ->placeholder('Enter the description')
                    ->rows(5),

                TextInput::make('years_number')
                    ->required()
                    ->label('Number of Years')
                    ->placeholder('Enter the number of years'),

                TextInput::make('years_text')
                    ->required()
                    ->label('Years Text')
                    ->placeholder('Enter the descriptive text for years'),

                TextInput::make('projects_number')
                    ->required()
                    ->label('Number of Projects')
                    ->placeholder('Enter the number of projects'),

                TextInput::make('projects_text')
                    ->required()
                    ->label('Projects Text')
                    ->placeholder('Enter the descriptive text for projects'),

                TextInput::make('frameworks_number')
                    ->required()
                    ->label('Number of Frameworks')
                    ->placeholder('Enter the number of frameworks'),

                TextInput::make('frameworks_text')
                    ->required()
                    ->label('Frameworks Text')
                    ->placeholder('Enter the descriptive text for frameworks'),

                TextInput::make('button_text')
                    ->required()
                    ->label('Button Text')
                    ->placeholder('Enter the text for the button'),

                FileUpload::make('button_link')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required()
                    ->label('Button PDF')
                    ->placeholder('Upload the PDF for the button'),

                TextInput::make('button_icon')
                    ->required()
                    ->label('Button Icon')
                    ->placeholder('Enter the icon class for the button'),
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

            $data['photo'] = "http://127.0.0.1:8000/api/image/".$data['photo'];
            $data['button_link'] = "http://127.0.0.1:8000/api/pdf/".$data['button_link']; 

            auth()->user()->about->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
