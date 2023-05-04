<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function test()
    {
        //Calling Event Before Dispatching the Job
        event(new \App\Events\NotificationEvent("Data Processing has started", Auth::id()));

        //Dispatching the Job
        dispatch(new \App\Jobs\TestJob("Post", Auth::id()));
    }
}
