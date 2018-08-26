<?php
require_once(__DIR__ . '/../handlers/event.php');


class EventController
{
    public $eventRestHandler;


    function __construct()
    {
        $this->eventRestHandler = new EventRestHandler();
    }


    function getEvents($request, $response, $args)
    {
        try {
            $events = $this->eventRestHandler->getAllEvents();
            echo json_encode($events);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

    function getEvent($request, $response, $args)
    {
        try {
            $eventId = $request->getAttribute('id');
            $event = $this->eventRestHandler->getEvent($eventId);
            echo json_encode($event);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

    function createEvent($request, $response, $args)
    {
        try {
            $data = $request->getParsedBody();
            $event_data = [];
            $event_data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
            $event_data['email'] = filter_var($data['email'], FILTER_SANITIZE_STRING);
            $event_data['event_type'] = filter_var($data['event_type'], FILTER_SANITIZE_STRING);
            $event_data['event_date'] = filter_var($data['event_date'], FILTER_SANITIZE_STRING);
            $event_data['event_time'] = filter_var($data['event_time'], FILTER_SANITIZE_STRING);
            $event_data['number_of_guests'] = filter_var($data['number_of_guests'], FILTER_SANITIZE_STRING);
            $event_data['event_location'] = filter_var($data['event_location'], FILTER_SANITIZE_STRING);
            $event_data['customer_message'] = filter_var($data['customer_message'], FILTER_SANITIZE_STRING);
            $eventresponse = $this->eventRestHandler->createEvent($event_data);
            echo $eventresponse;

        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

    function updateEvent($eventId)
    {
        try {
            echo 'Method is in Construction';
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

    function deleteEvent($eventId)
    {
        try {
            echo 'Method is in Construction';
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

}