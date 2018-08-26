<?php
require_once(__DIR__ . '/../handlers/subscribe.php');

class SubscribeController
{

    public $subscribeRestHandler;

    function __construct()
    {
        $this->subscribeRestHandler = new SubscribeHandler();
    }

    function subscribe($request, $response, $args)
    {
        try {

            $data = $request->getParsedBody();
            $subscribe_data = [];
            $subscribe_data['email'] = filter_var($data['email'], FILTER_SANITIZE_STRING);
            $subscribe_data['is_active'] = filter_var(1, FILTER_SANITIZE_STRING);
            $subscriberesponse = $this->subscribeRestHandler->subscribe($subscribe_data);

            echo $subscriberesponse;

        } catch (Exception $e) {
            error_log($e->getMessage(), 0);
        }
    }
}