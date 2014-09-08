<?php

//path to  the CreateDocx class within your PHPDocX installation
require_once '../../../classes/CreateDocx.inc';

$docx = new CreateDocx();

//we prepare some formatted text for insertion in the list
$textData = new WordFragment($docx);
$text = array();
$text[] = array('text' => 'We insert some ');
$text[] = array('text' => 'bold text', 'b' => 'on');
$textData->addText($text);

//and also some simple HTML to illustrate the fexibility of the method
$htmlData = new WordFragment($docx);
$html = '<i>Some HTML code</i> with a <a href="http://www.phpdocx.com">link</a>';
$htmlData->embedHTML($html);


$itemList= array(
    'In this example we use a custom list (val = 5) that comes bundled with the default PHPdocX template.',
    array(
        $textData,
        'Line B',
        'Line C'
    ),
    $htmlData,
    'Line 3',
);

//we set the style type to 5: other predefined Word list style

$docx->addList($itemList, 5);


$docx->createDocx('example_addList_3');