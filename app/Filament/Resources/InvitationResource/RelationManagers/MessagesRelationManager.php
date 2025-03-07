<?php

namespace App\Filament\Resources\InvitationResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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

class MessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'messages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->string()
                    ->maxLength(255),
                RichEditor::make('message')
                    ->label('Message')
                    ->required()
                    ->string()
                    ->maxLength(500)
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'redo',
                        'undo',
                    ]),
                Radio::make('presence_confirm')
                    ->label('Presence Confirm')
                    ->options([
                        true => 'Yes',
                        false => 'No',
                    ])
                    ->nullable()
                    ->inline(),
                TextInput::make('guest_total')
                    ->label('Guest Total')
                    ->nullable()
                    ->numeric()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('presence_confirm')
                    ->label('Presence Confirm')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Yes' : 'No';
                    }),
                TextColumn::make('guest_total')
                    ->label('Guset Total')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
