<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends Repository
{
    public function __construct(protected Task $model) { }

    public function getOnDemandTasks($skip)
    {
        return $this->model->when($skip !== null,
            function ($query) use ($skip) {
                $query->skip($skip);
            })
            ->take(15)
            ->orderBy('id', 'desc')
            ->get();
    }
}

