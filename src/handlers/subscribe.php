<?php
require_once(__DIR__ . "/../dao/subscribe.php");

class SubscribeHandler
{
    public $subscribedao;

    function __construct()
    {
        $this->subscribedao = new SubscribeDAO();
    }


    public function subscribe($subscribe_data)
    {
        $rawData = $this->subscribedao->createContact($subscribe_data);
        return $rawData;
    }
}
