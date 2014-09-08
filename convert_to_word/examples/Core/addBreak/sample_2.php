<?php

//path to  the CreateDocx class within your PHPDocX installation
require_once '../../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$text_1 = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';

$text_2 = 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut' .
    'aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit ' .
    'in voluptate velit esse cillum dolore eu fugiat nulla pariatur.';

$break = new WordFragment($docx);
$break->addBreak();

$runs = array();
$runs[] = array('text' => $text_1);
$runs[] = $break;
$runs[] = array('text' => $text_2);

$docx->addText($runs);

$docx->createDocx('example_addBreak_2');
