<?php

use PierceMcGeough\phpquartiles\Quartile;

class QuartileTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->scoresArray = [12.47, 8.91, 11.5, 9.86, 2.87, 15, 7.02, 4.68, 4.5];
        $this->quartiles = new Quartile($this->scoresArray);
    }

    /** @test */
    public function it_can_return_all_quartiles()
    {
        $expected = [
            'q1' => 4.59,
            'q2' => 8.91,
            'q3' => 11.99,
        ];

        $this->assertEquals($expected, $this->quartiles->getAllQuartiles());
    }

    /** @test */
    public function it_can_return_the_first_quartile()
    {
        $this->assertEquals(4.59, $this->quartiles->getFirstQuartile());
    }

    /** @test */
    public function it_can_return_the_median_quartile()
    {
        $this->assertEquals(8.91, $this->quartiles->getMedianQuartile());
    }

    /** @test */
    public function it_can_return_the_second_quartile()
    {
        $this->assertEquals(8.91, $this->quartiles->getSecondQuartile());
    }

    /** @test */
    public function it_can_return_the_third_quartile()
    {
        $this->assertEquals(11.99, $this->quartiles->getThirdQuartile());
    }

    /** @test */
    public function it_throws_an_error_when_text_is_in_the_array()
    {
        $scoresArray = ['Text', 12.47, 8.91, 11.5, 9.86, 2.87, 15, 7.02, 4.68, 4.5];

        $this->expectException(\Exception::class);

        $quartiles = new Quartile($scoresArray);
    }
}
