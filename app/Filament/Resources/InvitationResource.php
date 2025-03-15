<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvitationResource\Pages;
use App\Filament\Resources\InvitationResource\RelationManagers;
use App\Models\Invitation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
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

use App\Models\User;
use App\Models\Template;
use App\Filament\Forms\WeddingCoupleForm;
use App\Filament\Forms\QuoteForm;
use App\Filament\Forms\AudioForm;

class InvitationResource extends Resource
{
    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?int $navigationSort    = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->required()
                    ->options(
                        User::all()->pluck('name', 'id')->mapWithKeys(function ($name, $id) {
                            return [$id => $name . ' (' . User::find($id)->email . ')'];
                        })->toArray()
                    )
                    ->preload()
                    ->searchable(),
                TextInput::make('code')
                    ->label('Code')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->readOnly()
                    ->unique(ignoreRecord: true)
                    ->hidden(fn(string $context): bool => $context === 'create'),
                Select::make('template_id')
                    ->label('Template')
                    ->required()
                    // ->relationship('template', 'name')
                    ->options(
                        Template::all()->pluck('name', 'id')->mapWithKeys(function ($name, $id) {
                            return [$id => $name . ' (' . Template::find($id)->type . ')'];
                        })->toArray()
                    )
                    ->preload()
                    ->searchable(),
                DatePicker::make('expired_date')
                    ->label('Expired Date')
                    ->required()
                    ->native(false),
                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'Active'   => 'Active',
                        'Inactive' => 'Inactive',
                    ]),

                Tabs::make()
                    ->tabs([
                        // WEDDING COUPLE
                        Tabs\Tab::make('Wedding Couple')
                            ->icon('heroicon-o-envelope')
                            ->schema(WeddingCoupleForm::schema()),

                        // QUOTE
                        Tabs\Tab::make('Quote')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->schema(QuoteForm::schema()),

                        // AUDIO
                        Tabs\Tab::make('Audio')
                            ->icon('heroicon-o-musical-note')
                            ->schema(AudioForm::schema()),
                    ])
                    ->activeTab(0)
                    ->columnSpanFull()
                    ->hidden(fn(string $context): bool => $context === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        return $record->user->name . ' (' . $record->user->email . ')';
                    }),
                TextColumn::make('code')
                    ->label('Code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('expired_date')
                    ->label('Expired Date')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Active'   => 'success',
                        'Inactive' => 'gray',
                    }),
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EventsRelationManager::class,
            RelationManagers\LoveStoriesRelationManager::class,
            RelationManagers\GalleriesRelationManager::class,
            RelationManagers\StreamingsRelationManager::class,
            RelationManagers\GiftsRelationManager::class,
            RelationManagers\GuestsRelationManager::class,
            RelationManagers\MessagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListInvitations::route('/'),
            // 'create' => Pages\CreateInvitation::route('/create'),
            'edit'   => Pages\EditInvitation::route('/{record}/edit'),
        ];
    }
}
