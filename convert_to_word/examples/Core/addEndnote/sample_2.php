<?php

//path to  the CreateDocx class within your PHPDocX installation
require_once '../../../classes/CreateDocx.inc';

$docx = new CreateDocx();

$endnote = new WordFragment($docx, 'document');

$html = new WordFragment($docx, 'endnote');//notice the different "target"

$htmlCode = '<p>This is some HTML code with a link to <a href="http://www.2mdc.com">2mdc.com</a> and a random image: 
<img src="../../img/image.png" width="35" height="35" style="vertical-align: middle"></p>';

$html->embedHTML($htmlCode, array('downloadImages' => true));


$endnote->addEndnote(
    array(
        'textDocument' => 'endnote',
        'textEndnote' => $html,
        'endnoteMark' => array('customMark' => '*')
    )
);
                    

$text = array();
$text[]= array('text' => 'Here comes the ');
$text[]= $endnote;
$text[]= array('text' => ' and some other text.');


$docx->addText($text);
$docx->addText('Some other text.');

$docx->createDocx('example_Endnote_2');

