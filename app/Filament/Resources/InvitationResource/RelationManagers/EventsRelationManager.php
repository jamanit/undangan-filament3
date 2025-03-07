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

class EventsRelationManager extends RelationManager
{
    protected static string $relationship = 'events';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->label('Type')
                    ->required()
                    ->options([
                        'Akad'          => 'Akad',
                        'Resepsi'       => 'Resepsi',
                        'Ngunduh Mantu' => 'Ngunduh Mantu',
                    ]),
                TextInput::make('event_date')
                    ->label('Event Date')
                    ->required()
                    ->type('date')
                    ->string(),
                TextInput::make('location')
                    ->label('Location')
                    ->required()
                    ->string()
                    ->maxLength(255),
                TextInput::make('address')
                    ->label('Address')
                    ->required()
                    ->string()
                    ->maxLength(255),
                TextInput::make('map_url')
                    ->label('Map URL')
                    ->nullable()
                    ->type('url')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type')
            ->columns([
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('event_date')
                    ->label('Event Date')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Location')
                    ->searchable()
                    ->sortable()
                    ->limit(25),
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable()
                    ->sortable()
                    ->limit(25),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->since()
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
