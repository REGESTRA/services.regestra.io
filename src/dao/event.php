<?php
require_once("daobase.php");

/*
A domain Class to demonstrate RESTful web services
*/

Class EventDAO extends daobase
{
    /*
        you should hookup the DAO here
    */
    //regestra_contact_us

    public function getAllEvents()
    {
        try {
            $queryResult = $this->ProcessQuery('SELECT * FROM regestra_db.regestra_event_requests;');
            return $queryResult;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getEvent($id)
    {
        try {
            $queryResult = $this->ProcessQuery('SELECT * FROM regestra_db.regestra_event_requests WHERE event_request_id=' . $id . ';');
            return $queryResult;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createEvent($event_data)
    {
        $sql = 'INSERT INTO regestra_db.regestra_event_requests (name, email, event_type, event_date, event_time, number_of_guests,event_location, customer_message) VALUES (\'' . $event_data["name"] . '\',\'' . $event_data["email"] . '\',\'' . $event_data["event_type"] . '\',\'' . $event_data["event_date"] . '\',\'' . $event_data["event_time"] . '\',' . $event_data["number_of_guests"] . ',\'' . $event_data["event_location"] . '\',\'' . $event_data["customer_message"] . '\');';
        try {
            $result = $this->ProcessQuery($sql);

            $response = "";
            if ($result['mysql_error']) {
                $response = '{"result" : "Failed"}';
            } else {
                $response = '{"result" : "Success"}';
            }
            return $response;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
