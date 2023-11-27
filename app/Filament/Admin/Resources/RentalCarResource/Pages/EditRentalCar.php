<?php

namespace App\Filament\Admin\Resources\RentalCarResource\Pages;

use App\Filament\Admin\Resources\RentalCarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentalCar extends EditRecord
{
    protected static string $resource = RentalCarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
