<?php

/**
 * Created by PhpStorm.
 * User: Rao
 * Date: 4/13/2016
 * Time: 10:45 PM
 */
class Encoders extends RestBase
{
    /**
     * @param $rawData
     */
    public function ProcessResult($rawData)
    {
        $response = "";
        if (empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'No users found!');
        } else {
            $statusCode = 200;
        }
        
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this->setHttpHeaders($requestContentType, $statusCode);

        if (strpos($requestContentType, 'application/json') !== false) {
            $response = $this->encodeJson($rawData);
        } else if (strpos($requestContentType, 'text/html') !== false) {
            $response = $this->encodeHtml($rawData);
        } else if (strpos($requestContentType, 'application/xml') !== false) {
            $response = $this->encodeXml($rawData);
        }
        return $response;
    }

    private function encodeHtml($responseData)
    {
        $htmlResponse = "<table border='1'>";
        foreach ($responseData as $key => $value) {
            $htmlResponse .= "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }

    private function encodeJson($responseData)
    {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

    private function encodeXml($responseData)
    {
        // creating object of SimpleXMLElement
        $xml = new SimpleXMLElement('<?xml version="1.0"?><user></user>');
        foreach ($responseData as $key => $value) {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }
}