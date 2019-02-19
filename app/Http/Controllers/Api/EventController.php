<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Client;
use App\Repositories\EventRepository;
use App\Repositories\TaskRepository;


class EventController extends Controller
{

    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Remove when creating photos by events. This is temporary functionality
     */
    public function takePhoto()
    {
        $taskRepository = new TaskRepository();
        $taskRepository->createIfNotAlreadyRunning(Client::find(1), 'Camera', false);
    }

    /**
     * Remove when creating photos by events. This is temporary functionality
     */
    public function getLastPhoto()
    {
        $test = Attachment::orderby('id', 'desc')->first();

        header('Content-Type:'.$test->mime_type);
        header('Content-Length: ' . strlen($test->data));

        echo $test->data;
    }

}
