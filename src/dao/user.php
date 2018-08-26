<?php
require_once("daobase.php");
/* 
A domain Class to demonstrate RESTful web services
*/
Class UserDAO extends daobase
{
	/*
		you should hookup the DAO here
	*/
	//regestra_contact_us

	public function getAllUsers()
	{
		try {
			$queryResult = $this->ProcessQuery('SELECT * FROM regestra_db.CLDB_Users;');
			return $queryResult;
		} catch (Exception $e) {
			throw $e;
		}
	}

	public function getUser($id)
	{
		try {
			$queryResult = $this->ProcessQuery('SELECT * FROM regestra_db.CLDB_Users WHERE User_Id=' . $id . ';');
			return $queryResult;
		} catch (Exception $e) {
			throw $e;
		}
	}


    public function createContact($contact_data)
    {
        $sql = 'INSERT INTO regestra_db.regestra_contact_us (name, email, subject, customer_message) VALUES ("' . $contact_data["name"] . '","' . $contact_data["email"] . '","' . $contact_data["subject"] . '","' . $contact_data["customer_message"] . '");';
        try {
            $result = $this->ProcessQuery($sql);

            if ($result['mysql_error']) {
                echo '{"result" : "Failed"}';
            } else {
                echo '{"result" : "Success"}';
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
