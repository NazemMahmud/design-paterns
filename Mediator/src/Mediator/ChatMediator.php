<?php

namespace Piash\MediatorPattern\Mediator;

use Piash\MediatorPattern\Interface\Mediator;

class ChatMediator implements Mediator
{
    /**
     * Add users for a specific chat room
     * Send message to all users of a specific room, except the sender
     */

    /**
     * @var array
     */
    private $users;

    public function __construct()
    {
        $this->users = array();
    }

    /**
     * Add users for a chat room
     * @param object $user
     * @return void
     */
    public function addUser(object $user): void
    {
        $this->users[] = $user;
    }


    /**
     * Send message to users of a specific chat room
     * @param string $message
     * @param string $sender
     * @return void
     */
    public function send(string $message, string $sender): void
    {
        foreach ($this->users as $user) {
            if ($user != $sender) {
                $user->receive($message);
            }
        }
    }
}
