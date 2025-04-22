<?php


namespace App\Services;

use App\Contracts\TaskAssignmentStrategyInterface;
use App\Models\Task;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Cache;

class RoundRobinAssignmentStrategy implements TaskAssignmentStrategyInterface
{
    public function assign(Task $task): void
    {
        $employees = User::where('role', UserRole::EMPLOYEE)->pluck('id')->toArray();

        if (empty($employees)) {
            throw new \Exception("not found");
        }

        $lastAssigned = Cache::get('last_assigned_employee', -1);
        $nextIndex = ($lastAssigned + 1) % count($employees);
        $nextEmployeeId = $employees[$nextIndex];

        
        Cache::put('last_assigned_employee', $nextIndex);

        $task->update(['assigned_to' => $nextEmployeeId]);
    }
}
