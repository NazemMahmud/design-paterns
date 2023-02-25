<?php

namespace Piash\MementoPattern;

/**
 * Memento state
 */
class TextEditorMemento {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function getState() {
        return $this->text;
    }
}

