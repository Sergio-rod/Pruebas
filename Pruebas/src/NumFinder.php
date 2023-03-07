<?php

class NumFinder



{

    public function __construct(){
        
    }


    private $smallest = PHP_INT_MAX;
    private $largest = PHP_INT_MIN;

    public function find($nums)
    {
        foreach($nums as $valor){
            if(is_numeric($valor)){

        foreach ($nums as $n) {
            if ($n < $this->smallest)
                $this->smallest = $n;
                
            if ($n > $this->largest)
                $this->largest = $n;
        }

            }else{
                throw new InvalidArgumentException("Values are not numeric");
            }

        }
        

    }

    function getSmallest()
    {
        return $this->smallest;
    }
    function getLargest()
    {
        return $this->largest;
    }




}

// $nf = new NumFinder();

// $nf->find(array(-1,'s',-5));

//  echo $nf->getLargest();

//  echo $nf->getSmallest();


