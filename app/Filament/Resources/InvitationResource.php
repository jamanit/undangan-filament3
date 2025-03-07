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

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ViewColumn;

use App\Models\User;
use App\Models\Template;
use Filament\Resources\RelationManagers\RelationManager;

class InvitationResource extends Resource
{
    protected static ?string $model = Invitation::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?int $navigationSort    = 3;

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
                TextInput::make('expired_date')
                    ->label('Expired Date')
                    ->required()
                    ->type('date')
                    ->string(),
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
                            ->schema([
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
                            ]),

                        // QUOTE
                        Tabs\Tab::make('Quote')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->schema([
                                Group::make()
                                    ->relationship('quote')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                RichEditor::make('text')
                                                    ->label('Text')
                                                    ->placeholder('Enter Text')
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
                            ]),
                    ])
                    ->activeTab(0)
                    ->columnSpanFull()
                    ->hidden(fn(string $context): bool => $context === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            'create' => Pages\CreateInvitation::route('/create'),
            'edit'   => Pages\EditInvitation::route('/{record}/edit'),
        ];
    }
}
