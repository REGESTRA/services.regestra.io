<?php
require_once(__DIR__ . '/../handlers/user.php');


class UserController
{
    public $userRestHandler;

    function __construct()
    {
        $this->userRestHandler = new UserRestHandler();
    }

    function getUsers($request, $response, $args)
    {
        try {
            $users = $this->userRestHandler->getAllUsers();
            echo json_encode($users);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }


    function getUser($request, $response, $args)
    {
        try {
            $id = $request->getAttribute('id');
            $user = $this->userRestHandler->getUser($id);
            echo json_encode($user);
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }

    function createUser($request, $response, $args)
    {
        try {
            echo 'Method is in Construction';
        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }
}