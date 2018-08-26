<?php
require_once(__DIR__ . "/../dao/contactus.php");

class ContactUsHandler
{
    public $contactusdao;

    function __construct()
    {
        $this->contactusdao = new ContactUsDAO();
    }

    public function getAllContacts()
    {
        $rawData = $this->contactusdao->getAllContacts();
        return $rawData;
    }

    public function getContact($id)
    {
        $rawData = $this->contactusdao->getContact($id);
        return $rawData;
    }

    public function createContact($contact_data)
    {
        $rawData = $this->contactusdao->createContact($contact_data);
        return $rawData;
    }
}
