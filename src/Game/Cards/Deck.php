<?php
namespace Game\Cards;

use Game\Rest\Request;

class Deck {
    public function getNewDeck($url) {
      $request = new Request($url);
      return $request->getResponseBody();
    }
}
