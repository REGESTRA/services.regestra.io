<?php
require_once("daobase.php");

/*
A domain Class to demonstrate RESTful web services
*/

Class SubscribeDAO extends daobase
{
   
    public function subscribe($subscribe_data)
    {
        $timestamp = date('Y-m-d G:i:s');
        $sql = 'INSERT INTO regestra_db.tbl_subscribe (ID, email, created_date, is_active) VALUES (NULL, "' . $subscribe_data["email"] . '","' . $subscribe_data["email"] . '",' . $timestamp . ',"' . $subscribe_data["is_active"] . '");';
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
