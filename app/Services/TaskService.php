<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService extends Service
{
    public function __construct(protected TaskRepository $repository) { }
}

