<?php
namespace Game\Cards;

use Game\Rest\Request;

class Deck {

  public $request;

  public function __construct() {
    $this->request = new Request();
  }

  public function getNewDeck($url) {
    //return $this->request->getResponseBody($url);
    return $url;
  }

  public function showCards($url) {
    //return $this->request->getResponseBody($url);
    return 'test';
  }
}
