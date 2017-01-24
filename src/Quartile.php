<?php

namespace PierceMcGeough\phpquartiles;

class Quartile
{
    public $scores;
    public $quartiles;

    /**
     * Create a new Quartiles Instance
     */
    public function __construct($scores = null)
    {
        if ($this->arrayOnlyContainsNumbers($scores) === true) {
            $this->scores = $scores;
            $this->quartiles = $this->getQuartiles($scores);
        }
    }

    /**
     * Calculate the quartiles
     *
     * @param array $scores
     *
     * @return array
     */
    public function getQuartiles()
    {
        if (count($this->scores)+1 <= 3) {
            return;
        }

        sort($this->scores, SORT_NUMERIC);

        return [
            'lowest' => $this->getQuartile($this->scores, 0.25),
            'third'  => $this->getQuartile($this->scores, 0.50),
            'second' => $this->getQuartile($this->scores, 0.75)
        ];
    }


    /**
     * Use the params to work out the quartile specific to this $array
     *
     * @param $array
     * @param $quartilePlace
     *
     * @return float
     */
    public function getQuartile($array, $quartilePlace)
    {
        $pos = (count($array) + 1) * $quartilePlace;

        if (fmod($pos, 1) == 0) {
            return $array[$pos-1];
        }

        $fraction = $pos - floor($pos);

        $lower_num = $array[floor($pos) - 1];
        $upper_num = $array[ceil($pos) - 1];

        $difference = $upper_num - $lower_num;

        return round($lower_num + ($difference * $fraction), 2);
    }

    private function arrayOnlyContainsNumbers($scores)
    {
        foreach ($scores as $score) {
            if (!is_numeric($score)) {
                return false;
            }
        }

        return true;
    }
}
