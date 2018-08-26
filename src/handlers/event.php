<?php
require_once(__DIR__ . "/../dao/event.php");

class EventRestHandler
{
    public $eventdao;

    function __construct()
    {
        $this->eventdao = new EventDAO();
    }

    public function getAllEvents()
    {
        $rawData = $this->eventdao->getAllEvents();
        return $rawData;
    }

    public function getEvent($id)
    {
        $rawData = $this->eventdao->getEvent($id);
        return $rawData;
    }

    public function createEvent($event_data)
    {
        $rawData = $this->eventdao->createEvent($event_data);
        return $rawData;
    }
}
