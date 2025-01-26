<?php

namespace App\Filament\Resources\ExhibitionsResource\Pages;

use App\Filament\Resources\ExhibitionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExhibitions extends EditRecord
{
    protected static string $resource = ExhibitionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
