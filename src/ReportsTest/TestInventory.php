<?php

namespace TrTool\Report\Src\ReportsTest;

use TrTool\Report\Src\Classes\AReport;


/**
 * Class TestInventory
 * @package TrTool\Report\Src\ReportsTest
 */
class TestInventory extends AReport {

    public function getUniqueFileName() {
        $date = date('y-m-d_hms');
        $filename = $this->getTitle() . "_Report_" . $date;

        return $filename;
    }

    public function getTitle()
    {
        return "TestInventoryTitle";
    }

    public function getSubject()
    {
        return "TestInventorySubject";
    }

    /**
     * Generation des headers en fonction des onglets
     * @return array
     */
    public function getHeaders() {
        return array(
            0 => array(
                "product"       => array('text' => "Product", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING),
                "part_number"   => array('text' => "Part number", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING),
                "vendor"        => array('text' => "Vendor", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING),
                "batch"         => array('text' => "batch #", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING),
                "qty"           => array('text' => "Quantity", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING),
                "expiry_date"   => array('text' => "Expiry date", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING2 ),
                "created_at"    => array('text' => "Created at", 'format' => \PHPExcel_Cell_DataType::TYPE_STRING2 ),
            )
        );
    }

    /**
     * Generation des datas en fonction des onglets
     */
    public function getDatas() {
       
        $arShipments = array(
			1 => array(
                "product"       => 'Product 1',
                "part_number"   => 'Part_number 1',
                "vendor"        => 'Vendor 1',
                "batch"         => 'Batch #1',
                "qty"           => '2',
                "expiry_date"   => '2018-01-16',
                "created_at"    => '2017-01-01',
            ),
			2 => array(
                "product"       => 'Product 2',
                "part_number"   => 'Part_number 2',
                "vendor"        => 'Vendor 2',
                "batch"         => 'Batch #2',
                "qty"           => '2',
                "expiry_date"   => '2018-01-16',
                "created_at"    => '2017-01-01',
            ),
			3 => array(
                "product"       => 'Product 3',
                "part_number"   => 'Part_number 3',
                "vendor"        => 'Vendor 3',
                "batch"         => 'Batch #3',
                "qty"           => '2',
                "expiry_date"   => '2018-01-16',
                "created_at"    => '2017-01-01',
            )
		);

        return array(
            0 => $arShipments,
        );
    }

    public function getHeadersAndDatas()
    {
        return array($this->getHeaders(), $this->getDatas());
    }
}