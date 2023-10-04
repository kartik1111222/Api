<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TestEvent;

class EventController extends Controller
{
    public function fireevent(){
        broadcast(new TestEvent(["message" => "this is data passing to the event"]));
    }

    public function listenevent(){
        return view('testview');
    }
}
