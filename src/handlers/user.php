<?php
require_once(__DIR__ . "/../dao/user.php");

class UserRestHandler
{
    public $userdao;
    public $encoders;

    function __construct()
    {
        $this->userdao = new UserDAO();
    }

    public function getAllUsers()
    {
        $rawData = $this->userdao->getAllUsers();
        return $rawData;
    }

    public function getUser($id)
    {
        $rawData = $this->userdao->getUser($id);
        return $rawData;
    }
}
