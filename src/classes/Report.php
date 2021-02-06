<?php

namespace TrTool\Report\Src\Classes;

/**
 * Class Report
 * @package TrTool\Report\Src\Classes
 */
class Report {

    /**
     * Specific user object
     * @var mixed
     */
    var $_userObject;

    /**
     * Report constructor.
     * @param null|mixed $userObject
     */
    public function __construct($userObject) {

        $this->_userObject = $userObject;
    }

}