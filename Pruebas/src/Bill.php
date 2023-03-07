<?php

class Bill{
    private $id = "";
    private $amount = 0.0;

    function __construct($id,$amount){
        $this->id = $id;
        $this->amount = $amount;

    }
    public function getId(){
        return $this->id;
    }
    public function getAmount(){
        return $this->amount;
    }
}

?>