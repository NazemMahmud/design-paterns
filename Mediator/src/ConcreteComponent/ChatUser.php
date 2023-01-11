<?php

namespace Piash\MediatorPattern\ConcreteComponent;

use Piash\MediatorPattern\Abstract\User;

class ChatUser extends User
{
    public $name;

    public function __construct($mediator, $name)
    {
        parent::__construct($mediator);
        $this->name = $name;
    }

    public function receive($message)
    {
        echo $this->name . ": Received Message '$message'.\n";
    }
}
