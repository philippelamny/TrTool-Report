<?php

namespace TrTool\Report\Src\Classes;

/**
 * Class ReportBuilder
 * @package TrTool\Report\Src\Classes
 */
final class ReportBuilder {

    /**
     * Build the ReportType
     * Allow a abstraction for user
     *
     * @param AReport $AReport
     * @param $reportBuilderTypeCL
     * @return mixed
     */
    static public function build(AReport $AReport, $reportBuilderTypeCL) {
        $reportBuilderType = new $reportBuilderTypeCL($AReport);

        return $reportBuilderType;
    }
}