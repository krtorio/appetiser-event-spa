<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EventRepository;

class EventController extends Controller
{

    private $eventRepository;

    public function __construct(EventRepository $eventRepository) {

        $this->eventRepository = $eventRepository;

    }

    public function main() {
        return view('main');
    }

    public function getEvents($month = NULL) {
        return $this->eventRepository->getEventsByMonth($month);
    }

    public function addEvent(Request $request) {
        return $this->eventRepository->addEvents($request->event,$request->from,$request->to,$request->days);
    }

}
