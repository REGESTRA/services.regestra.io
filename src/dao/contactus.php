<?php
require_once("daobase.php");

/*
A domain Class to demonstrate RESTful web services
*/

Class ContactUsDAO extends daobase
{
    /*
        you should hookup the DAO here
    */
    //tbl_subscribe

    public function getAllContacts()
    {
        $sql = 'SELECT * FROM regestra_db.tbl_subscribe;';
        try {
            $queryResult = $this->ProcessQuery($sql);
            return $queryResult;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getContact($id)
    {
        $sql = 'SELECT * FROM regestra_db.tbl_subscribe WHERE ID=' . $id . ';';

        try {
            $queryResult = $this->ProcessQuery($sql);
            return $queryResult;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function createContact($contact_data)
    {
        $sql = 'INSERT INTO regestra_db. (name, email, subject message) VALUES ("' . $contact_data["name"] . '","' . $contact_data["email"] . '","' . $contact_data["subject"] . '","' . $contact_data["customer_message"] . '");';
        try {
            $result = $this->ProcessQuery($sql);
            $response = '';

            if ($result['mysql_error']) {
                $response =  '{"result" : "Failed"}';
            } else {
                $response = '{"result" : "Success"}';
            }

            return $response;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
