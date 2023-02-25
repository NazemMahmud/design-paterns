<?php

namespace Piash\MementoPattern;

/**
 * Caretaker class
 */
class TextEditorCaretaker {
    private TextEditor $textEditor;
    private array $mementos = [];
    private int $current = -1;

    public function __construct(TextEditor $textEditor) {
        $this->textEditor = $textEditor;
    }

    /**
     * Every text state is saved as a backup
     * @return void
     */
    public function backup(): void {
        // Remove any mementos after the current state
        array_splice($this->mementos, $this->current + 1);

        $this->current++;
        $this->mementos[$this->current] = $this->textEditor->createMemento();

    }

    public function undo() {
        echo "Undo action  \n";

        if ($this->current) {
            $this->current--;
            $this->textEditor->restoreFromMemento($this->mementos[$this->current]);
        }
    }

    public function redo(): void
    {
        echo "Redo action \n";

        // If there are any mementos after the current state, restore the next memento
        if (isset($this->mementos[$this->current + 1])) {
            $this->current++;
            $this->textEditor->restoreFromMemento($this->mementos[$this->current]);
        }
    }
}
