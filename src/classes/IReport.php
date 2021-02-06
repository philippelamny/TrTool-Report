<?php

namespace TrTool\Report\Src\Classes;

/**
 * Interface IReport
 * @package TrTool\Report\Src\Classes
 */
interface IReport {

    /**
     * @return Array
     */
    public function getHeaders();

    /**
     * @return Array
     */
    public function getDatas();

    /**
     * @return Array (Headers, Datas)
     */
    public function getHeadersAndDatas();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getUniqueFileName();

}