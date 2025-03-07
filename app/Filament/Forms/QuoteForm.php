<?php

namespace App\Filament\Forms;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Group;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ViewColumn;

class QuoteForm
{
    public static function schema(): array
    {
        return [
            Group::make()
                ->relationship('quote')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            RichEditor::make('text')
                                ->label('Text')
                                ->required()
                                ->string()
                                ->maxLength(500)
                                ->columnSpan('full')
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'redo',
                                    'undo',
                                ]),
                            FileUpload::make('image_1')
                                ->label('Image 1')
                                ->nullable()
                                ->image()
                                ->directory('quotes')
                                ->disk('public')
                                ->enableOpen()
                                ->maxSize(2048)
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'image_1' => null,
                                    ]);
                                }),
                            FileUpload::make('image_2')
                                ->label('Image 2')
                                ->nullable()
                                ->image()
                                ->directory('quotes')
                                ->disk('public')
                                ->enableOpen()
                                ->maxSize(2048)
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'image_2' => null,
                                    ]);
                                }),
                            FileUpload::make('image_3')
                                ->label('Image 3')
                                ->nullable()
                                ->image()
                                ->directory('quotes')
                                ->disk('public')
                                ->enableOpen()
                                ->maxSize(2048)
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'image_3' => null,
                                    ]);
                                }),
                            FileUpload::make('image_4')
                                ->label('Image 4')
                                ->nullable()
                                ->image()
                                ->directory('quotes')
                                ->disk('public')
                                ->enableOpen()
                                ->maxSize(2048)
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'image_4' => null,
                                    ]);
                                }),
                        ]),
                ]),
        ];
    }
}
