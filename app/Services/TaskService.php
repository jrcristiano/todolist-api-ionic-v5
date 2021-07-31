<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskService extends Service
{
    public function __construct(protected TaskRepository $repository) { }

    public function getOnDemandTasks(Request $request)
    {
        $skip = $request->get('skip') ?? null;
        return $this->repository->getOnDemandTasks($skip);
    }

    public function updateByDragUpDown(array $data)
    {
        extract($data);

        $taskFrom = $this->repository->find($from);
        $taskTo = $this->repository->find($to);

        $tasks = $this->getTaskList($from, $to);
        array_shift($tasks);

        foreach ($tasks as $task) {
            $task->id -= 1;
            $params = $this->setTaskParams($task);
            $this->repository->save($params, $task->id);
        }

        $params = $this->setTaskParams($taskFrom);
        $this->repository->save($params, $taskTo->id);
    }

    public function updateByDragDownUp(array $data)
    {
        extract($data);

        $taskFrom = $this->repository->find($from);
        $taskTo = $this->repository->find($to);

        $tasks = $this->getTaskList($from, $to);
        $tasks = array_reverse($tasks);

        array_pop($tasks);

        foreach ($tasks as $task) {
            $task->id += 1;
            $params = $this->setTaskParams($task);
            $this->repository->save($params, $task->id);
        }

        $params = $this->setTaskParams($taskFrom);
        $this->repository->save($params, $taskTo->id);
    }

    private function getTaskList(int $from, int $to): array
    {
        $tasks = [];
        foreach (range($from, $to) as $id) {
            $tasks[] = $this->repository->find($id);
        }
        return $tasks;
    }

    private function setTaskParams(mixed $task): array
    {
        return array(
            'title' => $task->title,
            'description' => $task->description,
            'status' => $task->status,
            'user_id' => $task->user_id
        );
    }
}

