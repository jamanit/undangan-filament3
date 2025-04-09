<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Template;
use App\Models\Invitation;
use App\Models\Inbox;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $total_and_new_users = User::selectRaw('COUNT(*) as total_users, SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as new_users', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->first();
        $total_users = $total_and_new_users->total_users ?? 0;
        $new_users   = $total_and_new_users->new_users ?? 0;

        $total_and_new_templates = Template::selectRaw('COUNT(*) as total_templates, SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as new_templates', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->first();
        $total_templates = $total_and_new_templates->total_templates ?? 0;
        $new_templates   = $total_and_new_templates->new_templates ?? 0;

        $total_and_new_invitations = Invitation::selectRaw('COUNT(*) as total_invitations, SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as new_invitations', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->first();
        $total_invitations = $total_and_new_invitations->total_invitations ?? 0;
        $new_invitations   = $total_and_new_invitations->new_invitations ?? 0;

        $total_and_new_inboxes = Inbox::selectRaw('COUNT(*) as total_inboxes, SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as new_inboxes', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->first();
        $total_inboxes = $total_and_new_inboxes->total_inboxes ?? 0;
        $new_inboxes   = $total_and_new_inboxes->new_inboxes ?? 0;

        $stats[] = Stat::make('Total Users', $total_users)
            ->description($new_users . ' this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->extraAttributes(['class' => 'cursor-pointer'])
            ->url(route('filament.admin.resources.users.index'))
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('primary');

        $stats[] = Stat::make('Total Templates', $total_templates)
            ->description($new_templates . ' this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->extraAttributes(['class' => 'cursor-pointer'])
            ->url(route('filament.admin.resources.templates.index'))
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger');

        $stats[] = Stat::make('Total Invitations', $total_invitations)
            ->description($new_invitations . ' this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->extraAttributes(['class' => 'cursor-pointer'])
            ->url(route('filament.admin.resources.invitations.index'))
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning');

        $stats[] = Stat::make('Total Inboxes', $total_inboxes)
            ->description($new_inboxes . ' this month')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->extraAttributes(['class' => 'cursor-pointer'])
            ->url(route('filament.admin.resources.inboxes.index'))
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success');

        return $stats;
    }
}
