<?php
namespace LazyStream;
/**
 * LazyStream Random Number Class
 */

require_once('Requirements.php');

class Randoms implements Requirements {
    
    private $used_numbers = array();
    
    public function popNext(){
        do {
            $val = rand();
            
        } while(isset($this->used_numbers[$val]));
        
        $this->used_numbers[$val] = true;
        
        return $val;
    }
    
}
