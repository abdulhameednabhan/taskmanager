<?php
use App\Models\Task;

interface TaskAssignmentStrategyInterface
{
    public function assign(Task $task): void;
}