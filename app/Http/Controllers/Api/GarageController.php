<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Repositories\ClientRepository;
use App\Repositories\EventRepository;
use App\Repositories\TaskRepository;

class GarageController extends Controller
{
    /** @var Client */
    protected $client;

    /** @var ClientRepository */
    protected $clientRepository;
    /** @var TaskRepository */
    protected $taskRepository;
    /** @var EventRepository */
    protected $eventRepository;

    public function __construct(
        ClientRepository $clientRepository,
        TaskRepository $taskRepository,
        EventRepository $eventRepository
    )
    {
        $this->clientRepository = $clientRepository;
        $this->taskRepository = $taskRepository;
        $this->eventRepository = $eventRepository;

        $this->client = $this->clientRepository->get('Garage');
    }

    public function activate()
    {
        $this->taskRepository->createIfNotAlreadyRunning($this->client, 'watchSwitch', true);
    }

    public function status()
    {
        $event = $this->eventRepository->getLastEvent($this->client, 'SWITCH');

        if (empty($event)) {
            return;
        }

        return $event->data;
    }

}
