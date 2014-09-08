<?php

//path to  the CreateDocx class within your PHPDocX installation
require_once '../../../classes/CreateDocx.inc';

$docx = new CreateDocx();


$docx->addLink('Link to Google', array('url'=> 'http://www.google.es'));

$docx->addText('And now the same link with some additional formatting:');

$linkOptions = array('url'=> 'http://www.google.es',
    'color' => 'B70000',
    'underline' => 'none'
    );
$docx->addLink('Link to Google in red color and not underlined', $linkOptions);

$docx->createDocx('example_addLink_1');