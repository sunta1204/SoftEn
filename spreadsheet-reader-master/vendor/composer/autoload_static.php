<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65267316aa8581fb3572ab50dde3d99b
{
    public static $classMap = array (
        'OLERead' => __DIR__ . '/../..' . '/php-excel-reader/excel_reader2.php',
        'SpreadsheetReader' => __DIR__ . '/../..' . '/SpreadsheetReader.php',
        'SpreadsheetReader_CSV' => __DIR__ . '/../..' . '/SpreadsheetReader_CSV.php',
        'SpreadsheetReader_ODS' => __DIR__ . '/../..' . '/SpreadsheetReader_ODS.php',
        'SpreadsheetReader_XLS' => __DIR__ . '/../..' . '/SpreadsheetReader_XLS.php',
        'SpreadsheetReader_XLSX' => __DIR__ . '/../..' . '/SpreadsheetReader_XLSX.php',
        'Spreadsheet_Excel_Reader' => __DIR__ . '/../..' . '/php-excel-reader/excel_reader2.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit65267316aa8581fb3572ab50dde3d99b::$classMap;

        }, null, ClassLoader::class);
    }
}
