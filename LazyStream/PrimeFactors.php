<?php
namespace LazyStream;
/**
 * LazyStream Prime Number Class
 */

require_once('Requirements.php');
require_once('Primes.php');

class PrimeFactors implements Requirements {

    private $_Primes;
    private $current_number;

    public function __construct($number){
        $this->current_number = (int) $number;
        $this->_Primes = new Primes();
    }

    /**
     * Return the next unique prime factor
     * @return int|null
     */
    public function popNext(){
        $factor = null;
        while($this->current_number > 1 && $factor == null){
            $next_prime = $this->_Primes->popNext();
            if($this->current_number % $next_prime == 0){
                $factor = $next_prime;
                while($this->current_number % $factor == 0){
                    $this->current_number = $this->current_number / $factor;
                }
            }
        }

        return $factor;

    }

}
