<?php 

namespace App\Repositories;

use App\EventDate;
use App\Event;

class EventRepository {

    public function getEventsByMonth($monthYear = NULL) {

        if (!$monthYear) { $monthYear = date('Y-m'); }

        $tempArray = explode('-',$monthYear);
        $year = $tempArray[0];
        $month = $tempArray[1];

        //$numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $numberOfDaysInMonth = date("t",strtotime("$year-$month-01"));
        $from = $year."-".$month."-01";
        $to = $year."-".$month."-".$numberOfDaysInMonth;

        //initialize month array
        $eventsOfTheMonth = [];
        for($count = 1; $count<=$numberOfDaysInMonth; $count++) {
            $eventsOfTheMonth[$year."-".$month."-".str_pad($count,2,"0",STR_PAD_LEFT)] = [];
        }

        $eventsInMonth = EventDate::whereBetween('event_date',[$from,$to])->get();

        foreach($eventsInMonth as $eventDate) {
            $eventsOfTheMonth[$eventDate->event_date][] = $eventDate->event->name;
        }

        $finalEventList = [];
        foreach($eventsOfTheMonth as $key => $value) {
            $finalEventList[] = ['month' => $key, 'events'=>implode(' , ',$value)];
        }

        $monthName = date("F Y",strtotime($monthYear."-01 00:00:00"));

        return json_encode(['month' => $monthName, 'numerical_month' => $month, 'year'=> $year , 'events' => $finalEventList]);

    }

    public function addEvents($event,$from,$to,$days) {

        $tempEvent = new Event();
        $tempEvent->name = $event;
        $tempEvent->save();

        $currentDate = $from;
        while(strtotime($currentDate)<strtotime($to)) {

            $currentDay = date('D',strtotime($currentDate));
            if (in_array($currentDay,$days)) {

                $tempEventDate = new EventDate();
                $tempEventDate->event_date=$currentDate;

                $tempEvent->dates()->save($tempEventDate);

            }

            $currentDate = date('Y-m-d',strtotime($currentDate." +1 day"));

        }

        return json_encode(['result' => 'success']);

    }

}