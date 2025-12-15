<?php

namespace App\Filament\Resources\UserGenerateResource\Pages;

use App\Filament\Resources\UserGenerateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserGenerate extends EditRecord
{
    protected static string $resource = UserGenerateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
