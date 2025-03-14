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

class AudioForm
{
    public static function schema(): array
    {
        return [
            Group::make()
                ->relationship('audio')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            FileUpload::make('file')
                                ->label('File')
                                ->required()
                                ->disk('public')
                                ->directory('audios')
                                ->acceptedFileTypes(['audio/mpeg', 'audio/wav', 'audio/ogg'])
                                ->maxSize(10240)
                                ->enableOpen()
                                ->deleteUploadedFileUsing(function ($file, $record) {
                                    Storage::disk('public')->delete($file);
                                    $record->update([
                                        'file' => null,
                                    ]);
                                }),
                        ]),
                ]),
        ];
    }
}
