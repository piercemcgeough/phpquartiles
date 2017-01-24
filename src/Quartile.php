<?php

namespace PierceMcGeough\phpquartiles;

class Quartile
{
    public $scores;
    public $quartiles;

    /**
     * Create a new Quartiles Instance
     */
    public function __construct($scores)
    {
        $this->scores = $scores;
        $this->quartiles = $this->getQuartiles($scores);
    }

    /**
     * Calculate the quartiles
     *
     * @param array $scores
     *
     * @return array
     */
    public function getQuartiles($scores)
    {

        if (count($scores)+1 <= 3) {
            return Hapm_quarter_report::QUARTILE_NONE;
        }

        sort($scores, SORT_NUMERIC);

        return [
            'lowest' => $this->getQuartile($scores, 0.25),
            'third'  => $this->getQuartile($scores, 0.50),
            'second' => $this->getQuartile($scores, 0.75)
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

        if ( fmod($pos, 1) == 0) {
            return $array[$pos-1];
        }

        $fraction = $pos - floor($pos);

        $lower_num = $array[floor($pos) - 1];
        $upper_num = $array[ceil($pos) - 1];

        $difference = $upper_num - $lower_num;

        return round($lower_num + ($difference * $fraction), 2);
    }
}
