<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.08.04.
 * Time: 19:29
 */

namespace PhpGuide\Table\Interfaces;


use PhpGuide\Table\Table;

interface TableInterface
{
    public function addHeader(array $header):void;
    public function addRow(array $row):void;

    public function renderHtml(): string;
    public function renderJSON(): string;
    public function getTable(): Table;
}