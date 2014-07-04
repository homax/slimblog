<?php

class ArticleControllerTest extends PHPUnit_Framework_TestCase {

    public function testIndexAction()
    {
        $a = 1;
        $b = $a * -1;
        $this->assertEquals(-1, $b);
        $array = [2];
        //PHPunit ругается на функцию mb_strlen
        //$str = Utils::introText("Длинное слово", 5);
        $this->assertFalse(empty($array));
        return $array;
    }

    /**
     * @depends testIndexAction
     */
    public function testPop(array $array)
    {
        $this->assertEquals("2", array_pop($array));
        $this->assertTrue(empty($array));
    }

    /**
     * @dataProvider provider
     */
    public function testAdd($a, $b, $c)
    {
        $this->assertEquals($c, $a + $b);
    }

    public function provider()
    {
        return array(
            array(0, 0, 0),
            array(0, 1, 1),
            array(1, 0, 1),
            array(1, 1, 2)
        );
    }

    public static function setUpBeforeClass() {
        echo "BeforeClass";
    }

}
 