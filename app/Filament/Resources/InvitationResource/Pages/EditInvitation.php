<?php

namespace App\Filament\Resources\InvitationResource\Pages;

use App\Filament\Resources\InvitationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvitation extends EditRecord
{
    protected static string $resource = InvitationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('seeInvitation')
                ->label('See Invitation')
                ->icon('heroicon-o-eye')
                ->url(fn() => url('/', $this->record->id))
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
