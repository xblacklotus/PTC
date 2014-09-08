<?php

//path to  the CreateDocx class within your PHPDocX installation
require_once '../../../classes/CreateDocx.inc';

$docx = new CreateDocx();
$docx->embedHTML('<h1 style="color: #b70000">The Wikipedia Article on the Periodic Table</h1>');
$html = file_get_contents('http://en.wikipedia.org/wiki/Periodic_table');
$options = array('parseDivsAsPs' => true, 
    'baseURL' => 'http://en.wikipedia.org/', 
    'downloadImages' => true, 
    'filter' => '#bodyContent');
$docx->embedHTML($html, $options);
$docx->modifyPageLayout('A3-landscape');

$docx->createDocx('example_embedHTML_2');