<?php

class Hamming{
    private $a;
    private $b;
    protected $hammingDis;

    /**
     * set initial state
     * @param string $a
     * @param string $b
     */
    public function __construct(string $a, string $b){
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * compares the symbols of two strings on same position
     * @param $offset
     * @return bool
     */
    private function checkSymbol($offset): bool
    {
        return $this->a[$offset]==$this->b[$offset];
    }

    /**
     * @return void
     *
     */
    public function run(){
        $count=0;
        $maxLen = max(strlen($this->a),strlen($this->b));
        for($i=0;$i<$maxLen;$i++){
            //we can only change symbol of one string to symbol of another string,so every time when symbols not same we should increase count
            if(!$this->checkSymbol($i)){
                $count++;
            }
        }
        $this->hammingDis = $count;
    }

    /**
     * return Hamming distance
     * @param string $a
     * @param string $b
     * @return int
     */
    static function hamming_dis(string $a,string $b): int
    {
        $Hamming = new Hamming($a,$b);
        $Hamming->run();
        return $Hamming->hammingDis;
    }
}

class Levenshtein{
    public $a;
    public $b;
    public $levenshteinDis;

    /**
     * set initial state
     * @param string $a
     * @param string $b
     */
    public function __construct(string $a, string $b){
        $this->a = $a;
        $this->b = $b;
    }

    public function run(){
        $matrix = [];
        //fill column of $matrix
        for ($i = 0; $i <= strlen($this->a); ++$i) $matrix[$i][0] = $i;
        //fill row of $matrix
        for ($j = 0; $j <= strlen($this->b); ++$j) $matrix[0][$j] = $j;
        //fill $matrix by Wagner-Fischer algorithm
        for ($i = 1; $i <= strlen($this->a); ++$i) {
            for ($j = 1; $j <= strlen($this->b); ++$j) {
                $substitutionCost = $this->a[$i - 1] == $this->b[$j - 1] ? 0 : 1;
                $matrix[$i][$j] = min($matrix[$i][$j - 1] + 1, $matrix[$i - 1][$j] + 1, $matrix[$i - 1][$j - 1] + $substitutionCost);
            }
        }
        $this->levenshteinDis = $matrix[strlen($this->a)][strlen($this->b)];
    }

    /**
     * return Levenshtein distance
     * @param string $a
     * @param string $b
     * @return int
     */
    static function levenshtein_dis(string $a,string $b): int
    {
        $Levenshtein = new Levenshtein($a,$b);
        $Levenshtein->run();
        return $Levenshtein->levenshteinDis;
    }
}

