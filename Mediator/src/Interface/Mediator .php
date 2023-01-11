<?php

namespace Piash\MediatorPattern\Interface;


interface Mediator
{
    public function send(string $message, string $sender): void;
}
