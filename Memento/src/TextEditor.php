<?php

namespace Piash\MementoPattern;

/**
 * Originator class
 */
class TextEditor
{
    private string $text;

    public function __construct($text = "") {
        $this->text = $text;
    }

    public function getText(): string {
        return $this->text;
    }

    public function setText($text): void {
        $this->text = $text;
    }

    public function createMemento(): TextEditorMemento {
        return new TextEditorMemento($this->text);
    }

    public function restoreFromMemento(TextEditorMemento $memento): void {
        $this->text = $memento->getState();
    }
}
