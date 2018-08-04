<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.08.04.
 * Time: 19:03
 */

namespace PhpGuide\Table;


use PhpGuide\Table\Interfaces\TableInterface;

class Table implements TableInterface
{
    private $header = [];
    private $rows = [];
}