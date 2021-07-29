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
}

