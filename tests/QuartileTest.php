<?php

use Phpquartiles\Quartile;

class QuartileTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    function can_get_quartiles()
    {
        // arrange
        $scoresArray = [12.47, 8.91, 11.5, 9.86, 2.87, 15, 7.02, 4.68, 4.5];

        // act
        $quartiles = new Quartile($scoresArray);

        // assert
        $expected = [
            [lowest] => 4.59,
            [third] => 8.91,
            [second] => 11.99,
        ];
        $this->assertEquals($expected, $quartiles);
    }
}
