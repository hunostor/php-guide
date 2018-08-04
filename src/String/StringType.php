<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.07.16.
 * Time: 6:25
 */

namespace PhpGuide\String;

class StringType
{
    private $string;

    public function __construct($string)
    {
        $this->string = $this->checkType($string);
    }

    private function checkType($string)
    {
        if(gettype($string) !== "string") {
            throw new \InvalidArgumentException("Specified parameter is not a string type!");
        }

        return $string;
    }

    public function getString(): string
    {
        return $this->string;
    }
}