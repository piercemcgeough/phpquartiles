<?php

use PierceMcGeough\phpquartiles\Quartile;

class PlacementTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_correctly_places_the_given_score()
    {
        $scoresArray = [12.47, 8.91, 11.5, 9.86, 2.87, 15, 7.02, 4.68, 4.5];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(15));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(12.47));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(11.5));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(9.86));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(8.91));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(7.02));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(4.68));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(4.5));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(2.87));
    }

    /** @test */
    public function it_correctly_places_the_given_score_inversed()
    {
        $scoresArray = [12.47, 8.91, 11.5, 9.86, 2.87, 15, 7.02, 4.68, 4.5];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacementInverse(15));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacementInverse(12.47));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacementInverse(11.5));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacementInverse(9.86));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacementInverse(8.91));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacementInverse(7.02));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacementInverse(4.68));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacementInverse(4.5));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacementInverse(2.87));
    }
}
