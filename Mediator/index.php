<?php

require_once __DIR__ . "/vendor/autoload.php";


use Piash\MediatorPattern\Mediator\ChatMediator;
use Piash\MediatorPattern\ConcreteComponent\ChatUser;

// this indicates a specific chat room
$mediator = new ChatMediator();
$john = new ChatUser($mediator, 'John');
$jane = new ChatUser($mediator, 'Jane');

$mediator->addUser($john);
$mediator->addUser($jane);

$john->send('Hi there!');
$jane->send('Hello!');
