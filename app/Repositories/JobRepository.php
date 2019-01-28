<?php

namespace App\Repositories;

use App\Models\Action;
use App\Models\Job;
use App\Models\Task;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class JobRepository
{

    public function all() : Collection
    {
        return Job::all();
    }

    protected function getJobActions(Job $job) : Collection
    {
        $tasks = $job->tasks()->get();

        $actionCollection = new Collection();
        /** @var Task $task */
        foreach($tasks as $task)
        {
            $actionCollection = $actionCollection->merge($task->actions()->get());
            $actionCollection = $actionCollection->merge($task->actions()->get());
        }

        return $actionCollection->unique();
    }

    public function subscribe(Job $job)
    {
        $uniqueActions = $this->getJobActions($job);

        /** @var Action $action */
        foreach($uniqueActions as $action)
        {
            if (! $action->subscribers()->get()->contains(Auth::user())) {
                $action->subscribers()->attach(Auth::user());
            }
        }

    }

    public function unsubscribe(Job $job)
    {
        $uniqueActions = $this->getJobActions($job);

        /** @var Action $action */
        foreach($uniqueActions as $action)
        {
            $action->subscribers()->detach(Auth::user());
        }
    }

}
