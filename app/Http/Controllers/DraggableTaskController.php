<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class DraggableTaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}

    public function updateByDragUpDown(Request $request)
    {
        $data = $this->validate($request, [
            'from' => 'required',
            'to' => 'required'
        ]);

        $this->taskService->updateByDragUpDown($data);
        return response(200);
    }

    public function updateByDragDownUp(Request $request)
    {
        $data = $this->validate($request, [
            'from' => 'required',
            'to' => 'required'
        ]);

        $task = $this->taskService->updateByDragDownUp($data);
        return response(200);
    }
}
