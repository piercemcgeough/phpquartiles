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
        $this->scores = $scores;

        if (!$this->arrayOnlyContainsNumbers()) {
            throw new \Exception('Scores can only contain numbers');
        }

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
            'q1' => $this->getQuartile(0.25),
            'q2' => $this->getQuartile(0.50),
            'q3' => $this->getQuartile(0.75)
        ];
    }

    /**
     * Get the quartiles
     *
     * @return array|void
     */
    public function getAllQuartiles()
    {
        return $this->quartiles;
    }

    /**
     * @return numeric
     */
    public function getFirstQuartile()
    {
        return $this->quartiles['q1'];
    }

    /**
     * @return numeric
     */
    public function getMedianQuartile()
    {
        return $this->quartiles['q2'];
    }

    /**
     * @return numeric
     */
    public function getSecondQuartile()
    {
        return $this->getMedianQuartile();
    }

    /**
     * @return numeric
     */
    public function getThirdQuartile()
    {
        return $this->quartiles['q3'];
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

    public function getPlacement($value)
    {
        $belongsIn = [
            'LOWEST_QUARTILE' => $value <= $this->quartiles['q1'],
            'SECOND_QUARTILE' => $this->belongsIn('q1', 'q2', $value),
            'THIRD_QUARTILE' => $this->belongsIn('q2', 'q3', $value),
            'HIGHEST_QUARTILE' => $value > $this->quartiles['q3'],
        ];

        if ($belongsIn['SECOND_QUARTILE'] && $belongsIn['THIRD_QUARTILE'] && $value >= $this->quartiles['q3']) {
            $belongsIn['HIGHEST_QUARTILE'] = true;
        }

        return $this->extractBelongsIn($belongsIn);
    }

    /**
     * Check if $value belongs in a quartile
     *
     * @param string $q1
     * @param string $q2
     * @param float $value
     *
     * @return boolean
     */
    function belongsIn($q1, $q2, $value)
    {
        if ($this->quartiles[$q1] == $this->quartiles[$q2]) { // Spans multiples
            return ($value >= $this->quartiles[$q1] &&  $value <= $this->quartiles[$q2]);
        } else {
            return ($value > $this->quartiles[$q1] &&  $value <= $this->quartiles[$q2]);
        }

        return false;
    }

    /**
     * Find the first TRUE value
     *
     * @param array $belongsIn
     *
     * @return string
     */
    function extractBelongsIn($belongsIn)
    {
        // Find the first TRUE value from bottom to top (hence array_reverse)
        foreach(array_reverse($belongsIn) as $placement => $active) {
            if ($active) {
                return $placement;
            }
        }

        return 'NONE';
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
