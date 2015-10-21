<?php

/**
 * This class will provide HTTP request interface.
**/

namespace Game\Rest;

class Request {
  public $setError;
  public $responseBody;
  public $httpCode;

  /**
   * Get the response body
   **/
  public function getResponseBody($url) {
    $this->executeRequest($url);
    return $this->responseBody;
  }

  /**
   * Execute curl request
   **/
  protected function executeRequest($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_URL, $url);

    $response = curl_exec($ch);

    $error = curl_error($ch);
    $this->setError($error);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $this->setHttpCode($httpCode);

    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $responseBody = substr($response, $headerSize);
    $this->setResponseBody($responseBody);

    curl_close($ch);
  }

  /**
   * Set if there are errors from the request
   **/
  protected function setError($error) {
    $this->error = $error;
  }

  /**
   * Set the response body for the executed request
   **/
   protected function setResponseBody($responseBody) {
     $this->responseBody = $responseBody;
   }

  /**
   * Set the http code for the executed request
   **/
  protected function setHttpCode($httpCode) {
    $this->httpCode = $http_code;
  }
}
