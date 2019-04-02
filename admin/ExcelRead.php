<?php

function ReadExcel($file_path){
    /** PHPExcel */
    require_once 'Classes/PHPExcel.php';

    /** PHPExcel_IOFactory - Reader */
    include 'Classes/PHPExcel/IOFactory.php';


    $inputFileName = "$file_path";  
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
    $objReader->setReadDataOnly(true);  
    $objPHPExcel = $objReader->load($inputFileName); 

    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
    $highestRow = $objWorksheet->getHighestRow();
    $highestColumn = $objWorksheet->getHighestColumn();

    $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
    $headingsArray = $headingsArray[1];

    $r = -1;
    $namedDataArray = array();
    for ($row = 2; $row <= $highestRow; ++$row) {
        $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
        if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
            ++$r;
            foreach($headingsArray as $columnKey => $columnHeading) {
                $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
            }
        }
    }
    return $namedDataArray;
}

// echo '<pre>';
// var_dump($namedDataArray);
// echo '</pre><hr />';

?>
