<?php

require '../vendor/autoload.php';

use Game\Config\Settings;
use Game\Cards\Deck;

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Create new card deck.
$game = new Deck;
$newDeck = $game->getNewDeck(Settings::$BASE_URL . '' . Settings::$NEW_DECK);
$deck = json_decode($newDeck, true);
$cards = $game->showCards(Settings::$BASE_URL . '' . $deck['deck_id'] . '' . Settings::$SHOW_CARDS);

// Routes: returns json
$app->get('/', function(Silex\Application $app) use ($cards) {
  $app['monolog']->addDebug('logging output.');
  return $cards;
});

$app->run();
