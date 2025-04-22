<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Services\TaskService;
use App\Services\RoundRobinAssignmentStrategy;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
    protected function handleRecordCreation(array $data): Model
    { 
        
        return app(TaskService::class)->createTask($data);
    }
}
