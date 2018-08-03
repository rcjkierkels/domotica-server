<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getLastEvent()
    {
        $lastEvent = Event::query()->orderBy('id', 'desc')->first();
        if (empty($lastEvent)) {
            echo '';
            exit;
        }
        echo $lastEvent->data;
        exit;
    }
}