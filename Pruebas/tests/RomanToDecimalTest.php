<?php

use PHPUnit\Framework\TestCase;

class RomanToDecimalTest extends TestCase{

    private $romanToDecimal;
    private $decimal;



    public function setUp():void{
        $this->romanToDecimal = new RomanToDecimal();
        $this->decimal = $this->romanToDecimal->convert('IV');

    }

    /**
     * @skip
     */
    /*
    public function testConvertToDecimal(){
        $this->assertEquals(4,$this->decimal);
        echo $this->decimal;
    }
 
*/
}

// estados de prueba
// entradas esperadas
// resultados esperados
// fail o  no fail
// si salio error como corregirlo



?>

