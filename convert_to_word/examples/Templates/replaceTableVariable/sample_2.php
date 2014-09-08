<?php

//path to  the CreateDocx class within your PHPDocX installation
require_once '../../../classes/CreateDocx.inc';

$docx = new CreateDocxFromTemplate('../../files/TemplateComplexTable.docx');

$docx->setTemplateSymbol('@');
$data = array(
	        array(
	            'ITEM' => 'Product A',
	            'REFERENCE' => '107AW3',
	            'PRICE' => '5.45'
	        ),
	        array(
	            'ITEM' => 'Product B',
	            'REFERENCE' => '204RS67O',
	            'PRICE' => '30.12'
	        ),
	        array(
	            'ITEM' => 'Product C',
	            'REFERENCE' => '25GTR56',
	            'PRICE' => '7.00'
	        )
        );

$docx->replaceTableVariable($data);


$docx->createDocx('example_replaceTableVariable_2');
