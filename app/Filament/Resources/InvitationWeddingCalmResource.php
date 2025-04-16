<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvitationWeddingCalmResource\Pages;
use App\Filament\Resources\InvitationWeddingCalmResource\RelationManagers;
use App\Models\Invitation;
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

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;

use App\Filament\Resources\InvitationWeddingCalmResource\forms;
use App\Models\User;
use App\Models\Template;

class InvitationWeddingCalmResource extends Resource
{
    protected static ?string $model = Invitation::class;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('User')
                    ->required()
                    ->relationship('user', 'name', function (Builder $query) {
                        return $query->select('id', 'name', 'email');
                    })
                    ->getOptionLabelFromRecordUsing(fn(User $record) => "{$record->name} ({$record->email})")
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
                    ->relationship('template', 'name')
                    ->getOptionLabelFromRecordUsing(fn(Template $record) => "{$record->name} ({$record->invitation_type})")
                    ->preload()
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, $record) {
                        if ($state && $record) {
                            $record->update([
                                'template_id' => $state,
                            ]);
                            $parameter = implode('-', array_slice(explode('-', $record->template->parameter), 0, 2));
                            return redirect()->route('filament.admin.resources.invitation-' . $parameter . 's.edit', ['record' => $record]);
                        }
                    }),
                DatePicker::make('expired_date')
                    ->label('Expired Date')
                    ->required(),
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
                            ->schema(Forms\WeddingCoupleForm::schema()),

                        // QUOTE
                        Tabs\Tab::make('Quote')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->schema(Forms\QuoteForm::schema()),

                        // AUDIO
                        Tabs\Tab::make('Audio')
                            ->icon('heroicon-o-musical-note')
                            ->schema(Forms\AudioForm::schema()),

                        // STREAMING
                        Tabs\Tab::make('Streaming')
                            ->icon('heroicon-o-video-camera')
                            ->schema(Forms\StreamingForm::schema()),

                        // CLOSING
                        Tabs\Tab::make('Closing')
                            ->icon('heroicon-o-x-circle')
                            ->schema(Forms\ClosingForm::schema()),
                    ])
                    ->activeTab(0)
                    ->columnSpanFull()
                    ->hidden(fn(string $context): bool => $context === 'create'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EventsRelationManager::class,
            RelationManagers\LoveStoriesRelationManager::class,
            RelationManagers\GalleriesRelationManager::class,
            RelationManagers\GiftsRelationManager::class,
            RelationManagers\GuestsRelationManager::class,
            RelationManagers\MessagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvitationWeddingCalms::route('/'),
            'edit' => Pages\EditInvitationWeddingCalm::route('/{record}/edit'),
        ];
    }
}
