<?php

namespace App\Filament\Resources\ComicResource\Pages;

use App\Filament\Resources\ComicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComics extends ListRecords
{
    protected static string $resource = ComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('backToDashboard')
                ->label('Kembali ke Dashboard')
                ->color('secondary')
                ->icon('heroicon-o-arrow-left')
                ->url(route('dashboard'))
                ->outlined(),
        ];
    }
}
