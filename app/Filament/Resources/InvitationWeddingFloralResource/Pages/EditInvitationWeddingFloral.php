<?php

namespace App\Filament\Resources\InvitationWeddingFloralResource\Pages;

use App\Filament\Resources\InvitationWeddingFloralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInvitationWeddingFloral extends EditRecord
{
    protected static string $resource = InvitationWeddingFloralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('seeInvitation')
                ->label('View Invitation')
                ->icon('heroicon-o-eye')
                ->url(fn($record) => $this->generateInvitationUrl($record))
                ->openUrlInNewTab(),
            Actions\DeleteAction::make()
                ->after(function () {
                    return redirect()->route('filament.admin.resources.invitations.index');
                }),
        ];
    }

    protected function generateInvitationUrl($record): string
    {
        $coupleNames = $record->weddingCouple
            ? $record->weddingCouple->bride_nickname . '&' . $record->weddingCouple->groom_nickname
            : 'Wanita&Pria';

        return url('/' . $record->id . '/' . $coupleNames . '/Kamu-dan-Partner');
    }

    public function getBreadcrumbs(): array
    {
        $baseRoute = route('filament.admin.resources.invitations.index');
        return [
            $baseRoute => 'Invitations',
            ''         => 'Edit',
        ];
    }
}
