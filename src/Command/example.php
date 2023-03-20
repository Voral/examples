<?php


use Vasoft\Examples\Command\Commands\CopyCommand;
use Vasoft\Examples\Command\Commands\CutCommand;
use Vasoft\Examples\Command\Commands\PasteCommand;
use Vasoft\Examples\Command\Commands\UndoCommand;
use Vasoft\Examples\Command\Services\Clipboard;
use Vasoft\Examples\Command\Services\ConsoleLogger;
use Vasoft\Examples\Command\Services\History;

include '../../vendor/autoload.php';

$text = 'A phrase for testing different patterns';

$clipboard = new Clipboard();
$logger = new ConsoleLogger();
$history = new History();

$undo = new UndoCommand($text, $clipboard, $logger, $history);

echo $text, PHP_EOL;
(new CopyCommand($text, $clipboard, $logger, $history))
    ->execute([
        CopyCommand::OFFSET => 2,
        CopyCommand::LENGTH => 3
    ]);
echo $text, PHP_EOL;
(new PasteCommand($text, $clipboard, $logger, $history))
    ->execute([
        PasteCommand::INSERT_TO => 10
    ]);
echo $text, PHP_EOL;
(new CutCommand($text, $clipboard, $logger, $history))
    ->execute([
        CutCommand::OFFSET => 8,
        CutCommand::LENGTH => 6
    ]);
echo $text, PHP_EOL;
(new PasteCommand($text, $clipboard, $logger, $history))
    ->execute([
        PasteCommand::INSERT_TO => 1
    ]);
echo $text, PHP_EOL;
echo PHP_EOL, 'Undo go', PHP_EOL;
$undo->execute();
echo $text, PHP_EOL;
$undo->execute();
echo $text, PHP_EOL;
$undo->execute();
echo $text, PHP_EOL;
