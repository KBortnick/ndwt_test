<?php
namespace LazyStream;
/**
 * LazyStream Prime Number Class
 */

require_once('Requirements.php');

class Primes implements Requirements {
    
    private $found_primes = array();
    
    public function popNext(){
        if(empty($this->found_primes)){
            $val = 2;
        }
        else {
            $is_prime = false;
            $val = end($this->found_primes);
            while($is_prime==false){
                $val++;
                $is_prime = true;
                foreach($this->found_primes as $prime){
                    if($val%$prime == 0){
                        $is_prime = false;
                        break;
                    }
                }
            }
        }
        
        $this->found_primes[] = $val;
        return $val;
    }
    
}
