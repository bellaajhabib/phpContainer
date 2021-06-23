<?php

require __DIR__.'/vendor/autoload.php';

$container = new Pimple();

require './app/config.php';
require './app/services.php';






$friendHarvester = $container['friend_harvester'];
$friendHarvester->emailFriends();