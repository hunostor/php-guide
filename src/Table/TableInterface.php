<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.08.05.
 * Time: 10:05
 */

namespace PhpGuide\Table;


interface TableInterface
{
    /**
     * set header
     * @param array $header
     */
    public function setHeader(array $header): void;

    /**
     * return columns count
     * @return int
     */
    public function countColumn(): int;

    /**
     * return table rows count
     * @return int
     */
    public function countRow(): int;

    /**
     * set table body
     * @param array $tableBody
     */
    public function setBody(array $tableBody): void;

    /**
     * return table json format
     * @return string
     */
    public function renderJSON(): string;

    /**
     * return table html format
     * @return string
     */
    public function renderHTML(): string;


    /**
     * set up table html element on classes
     * @param $classes string
     */
    public function setTableClasses(string $classes): void;

    /**
     * set up table header html element on classes
     * @param string $classes
     */
    public function setHeaderClasses(string $classes): void;

    /**
     * set up table (tbody) body html element on classes
     * @param string $classes
     */
    public function setBodyClasses(string $classes): void;
}