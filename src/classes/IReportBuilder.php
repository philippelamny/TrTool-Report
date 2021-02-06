<?php

namespace TrTool\Report\Src\Classes;

/**
 * Interface IReportBuilder
 * @package TrTool\Report\Src\Classes
 */
interface IReportBuilder {

    /**
     * @return mixed ObjectContent
     */
    public function generateFileContent();

    /**
     * @return string
     */
    public function getFileExtension();

    /**
     * @return string
     */
    public function getFileVersion();
}