<?php

namespace TrTool\Report\Src\Classes;

/**
 * Class AReportBuilderType
 * @package TrTool\Report\Src\Classes
 */
Abstract Class AReportBuilderType implements IReportBuilder {

    /** @var AReport $_areport */
    var $_areport;

    /**
     * AReportBuilderType constructor.
     * @param AReport $AReport
     */
    public function __construct(AReport $AReport) {

        $this->_areport = $AReport;
    }
}