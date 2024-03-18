<?php

namespace App\Filament\Resources\MajorOperatingSystemResource\Pages;

use App\Filament\Resources\MajorOperatingSystemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMajorOperatingSystem extends EditRecord
{
    protected static string $resource = MajorOperatingSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
