<?php
namespace App;

use Bill;

class InvoiceFilter {
    private $dao;

    function __construct($dao) {
        $this->dao = $dao;
    }
    
    public function filter() {
        $all = $this->dao->all();
        $filtered = [];
        foreach ($all as $inv) {
            echo "ID: " . $inv->getId() . "\tMonto: " . $inv->getAmount() . "\n";
            if ($inv->getAmount() < 100.0)
                array_push($filtered, new Bill($inv->getId(), $inv->getAmount()));
        }
        
        return $filtered;
    }
 }
 
?>