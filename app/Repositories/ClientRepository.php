<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{

    public function get(string $name) : Client
    {
        return Client::where('name', $name)->first();
    }

}