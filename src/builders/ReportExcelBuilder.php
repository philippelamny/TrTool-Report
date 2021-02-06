<?php

namespace TrTool\Report\Src\Builders;

use TrTool\Report\Src\Classes\AReportBuilderType;

/**
 * Class ReportExcelBuilder
 * Build a simple excel with header and data binded
 * @package TrTool\Report\Src\Builders
 */
class ReportExcelBuilder extends AReportBuilderType {

    /**
     * @return string
     */
    public function getFileExtension()
    {
        return 'xlsx';
    }

    /**
     * @return string
     */
    public function getFileVersion() {
        return 'Excel2007';
    }

    /**
     * @return \PHPExcel
     */
    public function generateFileContent()
    {
        $objPHPExcel = new \PHPExcel();

        // Manage the title / Subject
        $objPHPExcel->getProperties()->setCreator("")
            ->setLastModifiedBy("")
            ->setTitle($this->_areport->getTitle())
            ->setSubject($this->_areport->getSubject());

        // Fill the excel content
        list($headers, $datas) = $this->_areport->getHeadersAndDatas();
        self::writeBodyFileWithHeadersAndDatas($objPHPExcel, $headers, $datas);

        return $objPHPExcel;
    }


    /**
     * Generate the file
     * @param $dir
     * @return Object (url , filename)
     */
    public function generateFile($dir = null) {

        // Generation Content
        $objPHPExcel =  $this->generateFileContent();

        // Unique file
        $filename = $this->_areport->getUniqueFileName();

        if ($dir !== null && ( $dir[strlen($dir) - 1] != '/' ) ) $dir .= '/';

        $folder = str_replace(" ", "_", $dir);

        // Gestion des droits
        if (is_dir($folder) == false) mkdir($folder, 0777, true);

        $url = $folder . $filename. '.' . $this->getFileExtension();
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, $this->getFileVersion());

        $objWriter->save($url);

        return $url;
    }

    /**
     * Fonction pour écrire le contenu grace à un header et les datas
     * @param $objPHPExcel
     * @param array $headers
     * @param $datas
     * @return mixed
     */
    static public function writeBodyFileWithHeadersAndDatas(&$objPHPExcel, Array $headersTab, $datasTab) {
        // On parse les headers specifiés
        foreach ($headersTab as $tab => $headers) {
            // ON vérifie si on possède des datas pour le header pour vérifier l'intégrité
            if (key_exists($tab, $datasTab)) {
                $datas = $datasTab[$tab];
                $objPHPExcel->setActiveSheetIndex($tab);
                // Excel Spreadsheet Header Construction
                $ligne = 1;
                $col = 0;
                $ar_header_position = array();
                foreach ($headers as $key => $header) {
                    if (isset($header['width'])) {
                        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setWidth($headers[$key]['width']);
                    }
                    else {
                        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutosize(true);
                    }
                    $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $ligne)->setValue($header['text']);
                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $ligne)->getFill()->applyFromArray(array('type' => \PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '8DB4E2')));
                    $ar_header_position[$key] = $col;
                    $col++;
                }
                $ligne = 2;
                foreach ($datas as $data) {
                    foreach ($headers as $key => $header) {
                        if (isset($data[$key])) {

                            $col = $ar_header_position[$key];
                            $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $ligne)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);

                            if ($data[$key] instanceof \DateTime) {
                                $excelDate = \PHPExcel_Shared_Date::PHPToExcel($data[$key]->getTimestamp());
                                $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $ligne)->setValue($excelDate);
                                $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $ligne)->getNumberFormat()->setFormatCode('dd/mm/yyyy');
                            }
                            else {
                                $objPHPExcel->getActiveSheet()->getCellByColumnAndRow($col, $ligne)->setValueExplicit($data[$key], $headers[$key]['format']);

                                if ($headers[$key]['format'] == \PHPExcel_Cell_DataType::TYPE_STRING) {
                                    $objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $ligne)->getAlignment()->setWrapText(true);
                                }
                            }
                        }
                    }
                    $ligne++;
                }

                // Filtre sur les colonnes et figer la 1er ligne
                foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {
                    $sheet->setAutoFilter('A1:' . $sheet->getHighestColumn() . "1");
                    $sheet->freezePane('A2');
                }
            }
        }
        $objPHPExcel->setActiveSheetIndex(0);
    }
}