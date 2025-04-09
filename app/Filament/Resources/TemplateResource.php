<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemplateResource\Pages;
use App\Filament\Resources\TemplateResource\RelationManagers;
use App\Models\Template;
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

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?int $navigationSort     = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('invitation_type')
                    ->label('Invitation Type')
                    ->required()
                    ->options([
                        'Undangan Pernikahan'   => 'Undangan Pernikahan',
                    ])
                    ->disabled(fn(string $context): bool => $context === 'edit'),
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->disabled(fn(string $context): bool => $context === 'edit'),
                TextInput::make('parameter')
                    ->label('Parameter')
                    ->required()
                    ->string()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->disabled(fn(string $context): bool => $context === 'edit'),
                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        true  => 'Publish',
                        false => 'Inpublish',
                    ]),
                FileUpload::make('image')
                    ->label('Image')
                    ->required()
                    ->image()
                    ->directory('templates')
                    ->disk('public')
                    ->enableOpen()
                    // ->enableDownload()
                    ->maxSize(2048)
                    ->deleteUploadedFileUsing(function ($file, $record) {
                        Storage::disk('public')->delete($file);
                        $record->update([
                            'image' => null,
                        ]);
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id', 'desc')
            ->columns([
                TextColumn::make('invitation_type')
                    ->label('Invitation Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parameter')
                    ->label('Parameter')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color(fn(bool $state): string => $state ? 'success' : 'gray')
                    ->formatStateUsing(fn(bool $state): string => $state ? 'Publish' : 'Inpublish'),
                ImageColumn::make('image')
                    ->label('Image')
                    ->sortable()
                    ->searchable()
                    ->width(50)
                    ->height(50),
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
            ->actions([
                Tables\Actions\Action::make('seeTemplate')
                    ->label('View Template')
                    ->icon('heroicon-o-eye')
                    ->url(fn($record) => url('/templates/show/' . $record->parameter))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplates::route('/'),
            // 'create' => Pages\CreateTemplate::route('/create'),
            // 'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}
