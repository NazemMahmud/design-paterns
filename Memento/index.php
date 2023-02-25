<?php

require_once __DIR__ . "/vendor/autoload.php";


use Piash\MementoPattern\TextEditor;
use Piash\MementoPattern\TextEditorCaretaker;

$textEditor = new TextEditor("Hello, world!");
$caretaker = new TextEditorCaretaker($textEditor);

$caretaker->backup();
$textEditor->setText("Lorem Ipsum is simply dummy text");
$caretaker->backup();
$textEditor->setText("of the printing and typesetting industry");
$caretaker->backup();
$textEditor->setText("Lorem Ipsum has been the industry's standard dummy text");
$caretaker->backup();

echo $textEditor->getText() . "\n"; // Lorem Ipsum has been the industry's standard dummy text

$caretaker->undo();
echo $textEditor->getText() . "\n"; // of the printing and typesetting industry

$caretaker->undo();
echo $textEditor->getText() . "\n"; // Lorem Ipsum is simply dummy text

$caretaker->redo();
echo $textEditor->getText() . "\n"; // of the printing and typesetting industry

$caretaker->redo();
echo $textEditor->getText() . "\n"; // Lorem Ipsum has been the industry's standard dummy text

$caretaker->redo(); // Does nothing
