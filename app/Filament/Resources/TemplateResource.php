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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Columns\ViewColumn;

class TemplateResource extends Resource
{
    protected static ?string $model = Template::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Masters';
    protected static ?int $navigationSort     = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->placeholder('Enter Name')
                    ->required()
                    ->string()
                    ->maxLength(255),
                TextInput::make('parameter')
                    ->label('Parameter')
                    ->placeholder('Enter Parameter')
                    ->required()
                    ->string()
                    ->maxLength(255),
                TextInput::make('type')
                    ->label('Type')
                    ->placeholder('Enter Type')
                    ->required()
                    ->string()
                    ->maxLength(255),
                Select::make('status')
                    ->label('Status')
                    // ->placeholder('')
                    ->required()
                    ->options([
                        'Publish'    => 'Publish',
                        'Inpublish'  => 'Inpublish',
                    ]),
                FileUpload::make('image')
                    ->label('Image')
                    // ->placeholder('')
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
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parameter')
                    ->label('Parameter')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Image')
                    ->width(50)
                    ->height(50)
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}
