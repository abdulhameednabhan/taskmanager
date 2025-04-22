<?php

namespace App\Contracts;

use App\Models\Task;

interface TaskAssignmentStrategyInterface
{
    public function assign(Task $task): void;
}