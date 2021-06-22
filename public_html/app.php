<?php

require __DIR__.'/vendor/autoload.php';

use DiDemo\Mailer\SmtpMailer;
use DiDemo\FriendHarvester;

$container = new Pimple();
$container['mailer'] = $container->share(function (){
   return  new SmtpMailer('smtp.SendMoneyToStrangers.com',
       'smtpuser',
       'smtppass',
       '465'
   );
});

$dsn = 'sqlite:'.__DIR__.'/data/database.sqlite';
$pdo = new PDO($dsn);


$friendHarvester =new FriendHarvester($pdo,$container['mailer']);

$friendHarvester->emailFriends();