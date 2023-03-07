
<?php

class RomanToDecimal {

    public function __construct(){
    }


    private $romans = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    
   
    public function convert($roman) {
        $decimal = 0;
        $prev = 0;
        for ($i = strlen($roman) - 1; $i >= 0; $i--) {
            $current = $this->romans[$roman[$i]];
            if ($current < $prev) {
                $decimal -= $current;
            } else {
                $decimal += $current;
            }
            $prev = $current;
        }
        return $decimal;
    }
}

//     // Instanciar el objeto
// $roman_to_decimal = new RomanToDecimal();

// // Utilizar el objeto para convertir un número romano a decimal
// $decimal = $roman_to_decimal->convert('XXV');
// echo $decimal; // Imprime "15"





?>