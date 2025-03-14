<?php

namespace App\Filament\Resources\NoticiesResource\Pages;

use App\Filament\Resources\NoticiesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNoticies extends ListRecords
{
    protected static string $resource = NoticiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
