<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Job;
use App\Repositories\JobRepository;
use App\Http\Resources\Job as JobResource;


class JobController extends Controller
{

    protected $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function index()
    {
        return JobResource::collection($this->jobRepository->all());
    }

    /**
     * Subscribe to all notifiable actions belonging to this job
     */
    public function subscribe(\App\Models\Job $job)
    {
        $this->jobRepository->subscribe($job);
    }

    public function unsubscribe(\App\Models\Job $job)
    {
        $this->jobRepository->unsubscribe($job);
    }

}
