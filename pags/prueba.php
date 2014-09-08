<?php
var_dump($_POST);

$url =$_POST["gradff"];	

$html="<image src=".$url."></image>";

echo $html;

    chmod($url, 0755);


require_once '../convert_to_word/classes/CreateDocx.inc';

$docx = new CreateDocx();

$docx->embedHTML($html, array('isFile' => true, 'downloadImages' => true));
$docx->createDocx('simpleHTML');

?>