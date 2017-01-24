<?php

namespace PierceMcGeough\phpquartiles;

class Quartile
{
    private $scores;
    
    private $quartiles;

    /**
     * Create a new Quartiles Instance
     * @param array $scores
     */
    public function __construct(array $scores)
    {
        if (!$this->arrayOnlyContainsNumbers()) {
            throw new \Exceptioon('Scores can only contain numbers');
        }
       
        $this->scores = $scores;
        
        $this->calculateQuartiles();
    }

    /**
     * Calculate the quartiles
     */
    private function calculateQuartiles()
    {
        if (count($this->scores)+1 <= 3) {
            return;
        }

        sort($this->scores, SORT_NUMERIC);

        $this->quartiles = [
            'lowest' => $this->getQuartile(0.25),
            'third'  => $this->getQuartile(0.50),
            'second' => $this->getQuartile(0.75)
        ];
    }
    
    /**
     * Get the quartiles
     *
     * @return array|void
     */
    public function getQuartiles()
    {
        return $this->quartiles;
    }

    /**
     * Use the params to work out the quartile specific to this $array
     *
     * @param double $quartilePlace
     * @return float
     */
    public function getQuartile($quartilePlace)
    {
        $pos = (count($this->scores) + 1) * $quartilePlace;

        if (fmod($pos, 1) == 0) {
            return $this->scores[$pos-1];
        }

        $fraction = $pos - floor($pos);

        $lower_num = $this->scores[floor($pos) - 1];
        $upper_num = $this->scores[ceil($pos) - 1];

        $difference = $upper_num - $lower_num;

        return round($lower_num + ($difference * $fraction), 2);
    }

    /**
     * Validate that the scores array only contains numbers
     *
     * @return boolean
     */    
    private function arrayOnlyContainsNumbers()
    {
        foreach ($this->scores as $score) {
            if (!is_numeric($score)) {
                return false;
            }
        }

        return true;
    }
}
