<?php
namespace App\Services;

use App\Models\Task;
use App\Contracts\TaskAssignmentStrategyInterface;

class TaskService
{
    public function __construct(
        protected TaskAssignmentStrategyInterface $assignmentStrategy
    ) {}
    public function assignRoundRobin(Task $task): void
    {
        $this->assignmentStrategy->assign($task);
    }
    public function createTask(array $data): Task
    {
        $task = Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        $this->assignmentStrategy->assign($task);

        return $task;
    }
}
