# Mediator pattern
Mediator is **behavioral** design pattern that allows objects to communicate with each other without the need for them to be aware of each other's identities. This pattern defines a mediator object that encapsulates the coordination logic between multiple objects.

### More Details: [Documentation](https://docs.google.com/document/d/1x1Xk_y7dESYsaxAOsIKWWmlclnJkxktMf32RwfFknNE/edit#heading=h.xuyopzrj3dgw)
[NEED DOC OR MEDIUM LINK]

## Problem Domain

- Provided an HTML text
- Applied different types of filtering

## File Breakdown

- `ChatMediator`: This is a mediator which indicates that a specific room for group chat
- `ChatUser`: Abstract user class which defines how send and receive actions will occur using the mediator


## Run / Test
To run:
```angular2html
- Install dependencies: composer install
- Run command: php index.php
```
