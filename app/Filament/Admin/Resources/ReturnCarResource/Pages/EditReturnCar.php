<?php

namespace App\Filament\Admin\Resources\ReturnCarResource\Pages;

use App\Filament\Admin\Resources\ReturnCarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReturnCar extends EditRecord
{
    protected static string $resource = ReturnCarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
