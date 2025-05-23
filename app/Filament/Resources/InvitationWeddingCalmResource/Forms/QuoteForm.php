<?php

namespace App\Filament\Resources\InvitationWeddingCalmResource\Forms;

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
                        ]),
                ]),
        ];
    }
}
