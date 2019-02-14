<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Event;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $test = Attachment::orderby('id', 'desc')->first();

        header('Content-Type:'.$test->mime_type);
        header('Content-Length: ' . strlen($test->data));

        echo $test->data;
    }
}
