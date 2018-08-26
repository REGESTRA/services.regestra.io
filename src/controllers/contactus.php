<?php
require_once(__DIR__ . '/../handlers/contactus.php');

class ContactUsController
{

    public $contactusRestHandler;

    function __construct()
    {
        $this->contactusRestHandler = new ContactUsHandler();
    }

    function getContacts($request, $response, $args)
    {
        try {

            $contacts = $this->contactusRestHandler->getAllContacts();
            echo json_encode($contacts);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }


    function getContact($request, $response, $args)
    {
        try {
            $id = $request->getAttribute('id');
            $contact = $this->contactusRestHandler->getContact($id);
            echo json_encode($contact);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

    function createContact($request, $response, $args)
    {
        try {

            $data = $request->getParsedBody();
            $contact_data = [];
            $contact_data['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
            $contact_data['email'] = filter_var($data['email'], FILTER_SANITIZE_STRING);
            $contact_data['subject'] = filter_var($data['subject'], FILTER_SANITIZE_STRING);
            $contact_data['customer_message'] = filter_var($data['customer_message'], FILTER_SANITIZE_STRING);
            $contactresponse = $this->contactusRestHandler->createContact($contact_data);

            echo $contactresponse;

        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }
}