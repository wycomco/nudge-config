<?php

namespace App\Filament\Resources\MajorOperatingSystemResource\Pages;

use App\Filament\Resources\MajorOperatingSystemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMajorOperatingSystems extends ListRecords
{
    protected static string $resource = MajorOperatingSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
