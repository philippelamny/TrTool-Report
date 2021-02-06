<?php

require_once __DIR__ . '/../../../../autoload.php';

$reportObjectSpecifiUser = null;

$excelReport = \TrTool\Report\Src\Classes\ReportBuilder::build($bmg = new \TrTool\Report\Src\ReportsTest\TestInventory($reportObjectSpecifiUser), \TrTool\Report\Src\Builders\ReportExcelBuilder::class);

$url = $excelReport->generateFile('./');
