<?php

use PierceMcGeough\phpquartiles\Quartile;

class PlacementTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function it_correctly_places_the_given_score_1()
    {
        $scoresArray = [96.03, 94.81, 94.74, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 100, 98.05, 97.75, 96.43, 94.12, 91.13, 88.66, 87.5, 72.73, 150, 100, 100, 100, 100];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(150));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(100));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(98.05));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(97.75));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(96.43));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(96.03));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(94.81));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(72.73));
    }

    /** @test */
    public function it_correctly_places_the_given_score_2()
    {
        $scoresArray = [91, 80, 79.4, 75, 73, 73, 73, 70, 70, 70, 69, 61, 55, 54.55, 43.84, 41, 35, 30, 10];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(40));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(43.84));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(45));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(69));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(70));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(71));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(72));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(73));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(73.01));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(74));
    }

    /** @test */
    public function it_correctly_places_the_given_score_3()
    {
        $scoresArray = [150, 98.05, 97.75, 96.43, 96.03, 94.81, 94.74, 94.12, 91.13, 88.66, 87.5, 72.73, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(1));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(2));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(93.37));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(93.38));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(94));
    }

    /** @test */
    public function it_correctly_places_the_given_score_4()
    {
        $scoresArray = [15, 12.47, 11.5, 9.86, 8.91, 7.02, 4.68, 4.5, 2.87];
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
    public function it_correctly_places_the_given_score_5()
    {
        $scoresArray = [3000, 414.75, 98.91, 96.61, 91, 87.07, 83, 82.2, 81.48, 80.18, 80, 79.4, 78, 75.88, 75.16, 75, 75, 75, 75, 74.78, 73.71, 73, 70, 66.79, 66.39, 66, 65, 60, 58.97, 57.61, 55, 55, 52.5, 50, 45, 26, 24, 20.5];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(3000));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(414.75));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(98.91));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(96.61));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(91));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(87.07));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(82.2));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(81.48));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(80.18));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(80));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(78));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(74.78));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(73));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(66));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(57.61));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(55));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(24));
    }

    /** @test */
    public function it_correctly_places_the_given_score_6()
    {
        $scoresArray = [48.37, 38.77, 21.95, 14.17, 13.56, 10.58, 6.74, 6.48, 5.68, 5.31, 4.45, 3.84, 3.65, 3.04, 3.03, 2.58, 1.2, 1.08, 0.85, 0.62, 0.62, 0.49, 0.44, 0.25, 0.2];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(48.37));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(38.77));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(21.95));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(14.17));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(13.56));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(10.58));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(6.74));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(6.48));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(5.68));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(5.31));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(4.45));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(3.84));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(3.65));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(3.04));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(3.03));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(2.58));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(1.2));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(1.08));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(0.85));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(0.62));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(0.49));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(0.44));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(0.25));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(0.2));
    }

    /** @test */
    public function it_correctly_places_the_given_score_7()
    {
        $scoresArray = [6.07, 4.31, 3.77, 3.37, 3.03, 2.8, 2.69, 2.46, 2.04, 1.6, 1.37, 1.21, 0.85];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(6.07));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(4.31));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(3.77));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(3.31));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(3.03));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(2.8));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(2.69));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(2.46));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(2.04));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(1.6));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(1.37));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(1.21));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(0.85));
    }

    /** @test */
    public function it_correctly_places_the_given_score_8()
    {
        $scoresArray = [132, 30, 29.8, 28.2, 27.9, 26.77, 23.4, 13, 12, 12, 11, 10];
        $quartiles = new Quartile($scoresArray);

        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(132));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(30));
        $this->assertEquals('HIGHEST_QUARTILE', $quartiles->getPlacement(29.8));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(28.2));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(27.9));
        $this->assertEquals('THIRD_QUARTILE', $quartiles->getPlacement(26.77));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(23.4));
        $this->assertEquals('SECOND_QUARTILE', $quartiles->getPlacement(13));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(12));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(12));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(11));
        $this->assertEquals('LOWEST_QUARTILE', $quartiles->getPlacement(10));
    }
}
