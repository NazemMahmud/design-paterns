# Memento pattern
Memento is a **behavioral** design pattern that lets you save and restore the previous state of an object without violating encapsulation (without revealing the details of its implementation).

### More Details: [Documentation](https://medium.com/@nmpiash/memento-pattern-with-an-example-of-a-text-editor-3d81e424e938)

## Problem Domain

A text editor with undo-redo feature.

## File Breakdown

- `TextEditor`: The originator object whose state needs to be saved and restored.
- `TextEditorMemento`: Stores the state of the originator at a specific point in time.
- `TextEditorCaretaker`: Responsible for managing the mementos and providing the functionality to save and restore the state of the originator.


## Run / Test
To run:
```angular2html
- Install dependencies: composer install
- Run command: php index.php
```
