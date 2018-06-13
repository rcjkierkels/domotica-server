<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Task;

class TaskRepository
{
    public function createIfNotAlreadyRunning(Client $client, string $taskName, bool $keepRunning = false, int $intervalInMsec = 1000)
    {
        $task = Task::where('client_id', $client->id)
            ->where('name', $taskName)
            ->first();

        if (!empty($task)) {
            return false;
        }

        $task = new Task();
        $task->client_id = $client->id;
        $task->name = $taskName;
        $task->interval = $intervalInMsec;
        $task->keep = $keepRunning;
        $task->save();

        return $task;
    }
}