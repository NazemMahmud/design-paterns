# Mediator pattern
Mediator is **behavioral** design pattern that allows objects to communicate with each other without the need for them to be aware of each other's identities. This pattern defines a mediator object that encapsulates the coordination logic between multiple objects.

### More Details: [Documentation](https://medium.com/@nmpiash/mediator-pattern-with-an-example-of-a-chat-room-40593deb0cfa)

## Problem Domain

Communicate between users in a specific chatroom, without sending messages directly to others

## File Breakdown

- `ChatMediator`: This is a mediator which indicates that a specific room for group chat
- `ChatUser`: Abstract user class which defines how send and receive actions will occur using the mediator


## Run / Test
To run:
```angular2html
- Install dependencies: composer install
- Run command: php index.php
```
