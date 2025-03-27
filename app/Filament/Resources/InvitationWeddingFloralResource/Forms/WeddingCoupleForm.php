<?php

namespace App\Filament\Resources\InvitationWeddingFloralResource\Forms;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;

use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;

class WeddingCoupleForm
{
    public static function schema(): array
    {
        return [
            Group::make()
                ->relationship('weddingCouple')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            FileUpload::make('bride_photo')
                                ->label('Bride Photo')
                                ->nullable()
                                ->image()
                                ->directory('wedding-couples')
                                ->disk('public')
                                ->enableOpen()
                                ->maxSize(2048)
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'bride_photo' => null,
                                    ]);
                                }),
                        ]),
                    Grid::make(2)
                        ->schema([
                            TextInput::make('bride_full_name')
                                ->label('Bride Full Name')
                                ->required()
                                ->string()
                                ->maxLength(255),
                            TextInput::make('bride_nickname')
                                ->label('Bride Nickname')
                                ->required()
                                ->string()
                                ->maxLength(255),
                            TextInput::make('bride_child_number')
                                ->label('Bride Child Number')
                                ->required()
                                ->numeric()
                                ->maxLength(255),
                            TextInput::make('bride_mother_name')
                                ->label('Bride Mother Name')
                                ->required()
                                ->string()
                                ->maxLength(255),
                            TextInput::make('bride_father_name')
                                ->label('Bride Father Name')
                                ->required()
                                ->string()
                                ->maxLength(255),
                        ]),
                    Grid::make(2)
                        ->schema([
                            FileUpload::make('groom_photo')
                                ->label('Groom Photo')
                                ->nullable()
                                ->image()
                                ->directory('wedding-couples')
                                ->disk('public')
                                ->enableOpen()
                                ->maxSize(2048)
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'groom_photo' => null,
                                    ]);
                                }),
                        ]),
                    Grid::make(2)
                        ->schema([
                            TextInput::make('groom_full_name')
                                ->label('Groom Full Name')
                                ->required()
                                ->string()
                                ->maxLength(255),
                            TextInput::make('groom_nickname')
                                ->label('Groom Nickname')
                                ->required()
                                ->string()
                                ->maxLength(255),
                            TextInput::make('groom_child_number')
                                ->label('Groom Child Number')
                                ->required()
                                ->numeric()
                                ->maxLength(255),
                            TextInput::make('groom_mother_name')
                                ->label('Groom Mother Name')
                                ->required()
                                ->string()
                                ->maxLength(255),
                            TextInput::make('groom_father_name')
                                ->label('Groom Father Name')
                                ->required()
                                ->string()
                                ->maxLength(255),
                        ]),
                    Grid::make(2)
                        ->schema([
                            TextInput::make('opening_greeting')
                                ->label('Opening Greeting')
                                ->required()
                                ->string()
                                ->maxLength(255)
                                ->default("Assalamu'alaikum Warahmatullahi Wabarakatuh"),
                            RichEditor::make('text_greeting')
                                ->label('Text Greeting')
                                ->required()
                                ->string()
                                ->maxLength(500)
                                ->extraAttributes([
                                    'style' => 'max-height: 150px;',
                                ])
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'redo',
                                    'undo',
                                ])
                                ->default("Dengan memohon Rahmat dan Ridho Allah SWT kami bermaksud untuk mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami:"),
                        ]),
                ]),
        ];
    }
}
