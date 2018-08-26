<?php
require_once(__DIR__ . '/controllers/event.php');
require_once(__DIR__ . '/controllers/contactus.php');
require_once(__DIR__ . '/controllers/user.php');

// Routes
$app->group('/api', function () {
    $this->group('/v1', function () {

        //Events
        $this->group('/events', function () {
            $this->get('', 'EventController:getEvents');
            $this->get('/[{id}]', 'EventController:getEvent');
            $this->post('', 'EventController:createEvent');
        });

        //CONTACTS
        $this->group('/contacts', function () {
            $this->get('', 'ContactUsController:getContacts');
            $this->get('/[{id}]', 'ContactUsController:getContact');
            $this->post('', 'ContactUsController:createContact');
        });

        //USERS
        $this->group('/users', function () {
            $this->get('', "UserController:getUsers");
            $this->get('/[{id}]', 'UserController:getUser');
            $this->post('', 'UserController:createUser');
        });
    });
});