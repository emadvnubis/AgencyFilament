<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    protected static string $resource = ServiceResource::class;

    public function mount(): void
    {
        $this->form->fill([
            'updated_at' => now(),
            'created_at' => now(),
        ]);
    }

}
