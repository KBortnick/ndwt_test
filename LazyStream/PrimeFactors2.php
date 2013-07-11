<?php
namespace LazyStream;
/**
 * LazyStream Prime Number Class
 */

require_once('Requirements.php');
require_once('Primes.php');

class PrimeFactors2 implements Requirements {
    
    private $_Primes;
    private $current_number;
    private $current_prime;
    
    public function __construct($number){
        $this->current_number = (int) $number;
        $this->_Primes = new Primes();
        $this->current_prime = $this->_Primes->popNext();
    }
    
    /**
     * Return a prime factor, including non-unique 
     * @return int|null
     */
    public function popNext(){
        $factor = null;
        
        while($this->current_number > 1 && $factor == null){
            if($this->current_number % $this->current_prime == 0){
                $factor = $this->current_prime;
                $this->current_number = $this->current_number / $factor;
            }
            else {
                $this->current_prime = $this->_Primes->popNext();
            }
        }

        return $factor;
    }
    
}
