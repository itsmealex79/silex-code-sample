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
$newDeck = $game->getNewDeck(Settings::$BASE_URL . '' . Settings::$NEW_DECK);print_r($newDeck);die();
$deck = $game->showCards(Settings::$BASE_URL . '' . $newDeck['deck_id'] . '' . Settings::$SHOW_CARDS);

// Routes
$app->get('/', function(Silex\Application $app) use ($deck) {
  $app['monolog']->addDebug('logging output.');
  return $deck;
});

$app->run();
