<?php

namespace App\Filament\Resources\TemplateResource\Pages;

use App\Filament\Resources\TemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemplate extends EditRecord
{
    protected static string $resource = TemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('seeTemplate')
                ->label('See Template')
                ->icon('heroicon-o-eye')
                ->url(fn() => url('/'))
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
