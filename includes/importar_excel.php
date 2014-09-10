<?php
if(isset($_POST['tabla']) && $_POST['tabla']!="undefined" )
{	

	/**
	 * PHPExcel
	 *
	 * Copyright (C) 2006 - 2012 PHPExcel
	 *
	 * This library is free software; you can redistribute it and/or
	 * modify it under the terms of the GNU Lesser General Public
	 * License as published by the Free Software Foundation; either
	 * version 2.1 of the License, or (at your option) any later version.
	 *
	 * This library is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	 * Lesser General Public License for more details.
	 *
	 * You should have received a copy of the GNU Lesser General Public
	 * License along with this library; if not, write to the Free Software
	 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
	 *
	 * @category   PHPExcel
	 * @package    PHPExcel
	 * @copyright  Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
	 * @version    1.7.8, 2012-10-12
	 */

	/** Error reporting */
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	if (PHP_SAPI == 'cli')
		die('This example should only be run from a Web Browser');

	/** Include PHPExcel */
	require_once 'Classes/PHPExcel.php';


	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
								 ->setLastModifiedBy("Maarten Balliauw")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Test result file");

	$filas=$_POST['filas'];
	$columnas=$_POST['columnas'];
	$tabla=explode(",",$_POST['tabla']);	
	$letras=array("A","B","C","D","E","F","G","H");
	
	// Add some data
	$k=0;
	for($i=0;$i<intval($filas);$i++)
	{ 
	    for($j=0;$j<intval($columnas);$j++)
	    {
	        $objPHPExcel->setActiveSheetIndex(0)
	            ->setCellValue($letras[$j].($i+1), $tabla[$k]);	            
	        $k++;
	    }        
	}



	// Rename worksheet
	$objPHPExcel->getActiveSheet()->setTitle('Simple');


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', __FILE__));

	$file="importar_excel.xls";

	if (file_exists($file)) {
	    echo "1";

	}
	else
	{
		echo file_exists($file);
		var_dump($tabla);
	/*echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME));
	*/
	}

	
}
?>
