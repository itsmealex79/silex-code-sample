<?php

require '../vendor/autoload.php';

use Game\Config\Settings;
use Game\Cards\Deck;

$app = new Silex\Application();
$app['debug'] = true;


// Create new card deck.
$game = new Deck;
$newDeck = $game->getNewDeck(Settings::$BASE_URL . Settings::$NEW_DECK);
$deck = $game->showCards(Settings::$BASE_URL . '' . $newDeck['deck_id'] . '' . Settings::$SHOW_CARDS);

// Routes
$app->get('/', function() use ($deck) {
    return $deck;
});

$app->run();
