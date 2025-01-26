<?php

namespace App\Filament\Resources\ExhibitionsResource\Pages;

use App\Filament\Resources\ExhibitionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExhibitions extends ListRecords
{
    protected static string $resource = ExhibitionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
