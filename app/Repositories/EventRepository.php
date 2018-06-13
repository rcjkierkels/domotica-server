<?php

namespace App\Repositories;


use App\Models\Client;
use App\Models\Event;

class EventRepository
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getLastEvent(Client $client, string $type = null)
    {
        $event = Event::where('client_id', $client->id);

        if (!empty($type)) {
            $event->where('event', $type);
        }

        return $event->orderBy('created_at', 'desc')->first();
    }



}