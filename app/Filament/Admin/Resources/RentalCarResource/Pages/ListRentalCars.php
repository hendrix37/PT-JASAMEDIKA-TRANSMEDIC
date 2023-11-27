<?php

namespace App\Filament\Admin\Resources\RentalCarResource\Pages;

use App\Filament\Admin\Resources\RentalCarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentalCars extends ListRecords
{
    protected static string $resource = RentalCarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
