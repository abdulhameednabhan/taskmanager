<?php
namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {}

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $task = $this->taskService->createTask($data);

        return response()->json(['message' => 'success', 'task' => $task]);
    }
}
