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

    /**
     * @test
     */
    public function string_length()
    {
        $string = new StringType('a');
        $length = $string->length();
        $this->assertSame(1, $length);

        $string = new StringType('alma');
        $length = $string->length();
        $this->assertSame(4, $length);
    }

    /**
     * @test
     */
    public function string_length_equal_0_empty_string()
    {
        $string = new StringType('');
        $length = $string->length();
        $this->assertSame(0, $length);
    }

    /**
     * @test
     */
    public function string_behavior_use_magical_method()
    {
        $string = new StringType('attila');
        $lit = (string) $string;
        $this->assertSame('attila', $lit);
    }
}