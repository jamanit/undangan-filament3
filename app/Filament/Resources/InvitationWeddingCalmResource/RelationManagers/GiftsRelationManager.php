<?php

namespace App\Filament\Resources\InvitationWeddingCalmResource\RelationManagers;

use App\Models\Gift;
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

class GiftsRelationManager extends RelationManager
{
    protected static string $relationship = 'gifts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->label('Type')
                    ->required()
                    ->options([
                        'Rekening' => 'Rekening',
                        'Paket'    => 'Paket',
                    ])
                    ->reactive(),
                TextInput::make('account_name')
                    ->label('Account Name')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->visible(fn($get) => $get('type') === 'Rekening'),
                TextInput::make('account_number')
                    ->label('Account Number')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->visible(fn($get) => $get('type') === 'Rekening'),
                TextInput::make('account_holder')
                    ->label('Account Holder')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->visible(fn($get) => $get('type') === 'Rekening'),
                TextInput::make('recipient_name')
                    ->label('Recipient Name')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->visible(fn($get) => $get('type') === 'Paket'),
                TextInput::make('recipient_address')
                    ->label('Recipient Address')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->visible(fn($get) => $get('type') === 'Paket'),
                TextInput::make('recipient_phone_number')
                    ->label('Recipient Phone Number')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->visible(fn($get) => $get('type') === 'Paket'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->defaultSort('order', 'asc')
            ->reorderable('order')
            ->recordTitleAttribute('type')
            ->columns([
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->sortable()
                    ->searchable()
                    ->dateTime()
                    ->since()
                    ->dateTimeTooltip(),
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
