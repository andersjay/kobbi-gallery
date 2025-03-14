<?php

namespace App\Filament\Resources\NoticiesResource\Pages;

use App\Filament\Resources\NoticiesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNoticies extends EditRecord
{
    protected static string $resource = NoticiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
