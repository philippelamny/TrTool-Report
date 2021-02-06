<?php

namespace TrTool\Report\Src\Classes;

/**
 * Class AReport
 * @package TrTool\Report\Src\Classes
 */
Abstract Class AReport implements IReport {

    /** @var Report Report */
    var $report;

    public function __construct($userObject) {

        $this->report = new Report($userObject);
    }

    /**
     * @param $AReportBuilderTypeCL
     * @return mixed
     */
    protected function getReportBuilder($AReportBuilderTypeCL) {
        return ReportBuilder::build($this, $AReportBuilderTypeCL);
    }

}