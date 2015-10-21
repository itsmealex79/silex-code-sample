<?php

require '../vendor/autoload.php';

use Game\Config\Settings;
use Game\Cards\Deck;

$app = new Silex\Application();
$app['debug'] = true;


// Create new card deck.
$game = new Deck;
$deck = $game->getNewDeck(Settings::$URL);

// Routes
$app->get('/', function() use ($deck) {
    return $deck;
});

$app->run();
