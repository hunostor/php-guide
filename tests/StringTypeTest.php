<?php
/**
 * Created by PhpStorm.
 * User: hunostor
 * Date: 2018.07.16.
 * Time: 6:35
 */

use PhpGuide\String\StringType;

class StringTypeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function construct_parameter_type_int()
    {
        $flag = false;
        try {
            $string = new StringType(342);
        } catch (InvalidArgumentException $exception) {
            $flag = true;
        }

        $this->assertTrue($flag);
    }

    /**
     * @test
     */
    public function construct_parameter_type_string()
    {
        $flag = false;
        try {
            $string = new StringType("Greetings");
        } catch (InvalidArgumentException $exception) {
            $flag = true;
        }

        $this->assertFalse($flag);
    }

    /**
     * @test
     */
    public function construct_parameter_type_float()
    {
        $flag = false;
        try {
            $string = new StringType(43534.45354);
        } catch (InvalidArgumentException $exception) {
            $flag = true;
        }

        $this->assertTrue($flag);
    }
}