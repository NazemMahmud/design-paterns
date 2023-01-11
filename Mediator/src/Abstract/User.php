<?php

namespace Piash\MediatorPattern\Abstract;

abstract class User
{
    protected $mediator;

    public function __construct($mediator)
    {
        $this->mediator = $mediator;
    }

    public function send($message)
    {
        $this->mediator->send($message, $this);
    }

    abstract public function receive($message);
}
